<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    //

    public function index()

    {
        $carouselImages = Admin::all();
        $projectImages  = Project::all();
        return Inertia::render('Admin',['carouselImages' => $carouselImages,'projectImages'=> $projectImages]);
    }


    public function addCarouselImage(Request $request)

    {  
        $uploadedFile = $request->carouselImage;
        $imageName = $uploadedFile->getClientOriginalName();
        $destinationDirectory = '/var/www/laravel/portfolio/public/images';
        $imageFile = '/images/';
 
        if ($uploadedFile->move($destinationDirectory, $imageName)) {
            Admin::create(['image_type'=>'Carousel','image_file_name'=>$imageFile.$imageName]);
        }

    }

 


    public function deleteCarouselImage(Request $request)

    {
   
        $carousel_image = Admin::find($request->carousel_id);
        if($carousel_image){
            $carousel_image->delete();
            return redirect()->route('admin')->with('success');
        }

    }

    public function addProjectImage(Request $request)

    {
        
        $projectName   = $request->projectName;
        $projectLink   = $request->projectLink;
        
        $productImage1 = $request->productImage1;
        $productImage2 = $request->productImage2;
        $productImage3 = $request->productImage3;
        $productImage4 = $request->productImage4;
        $productImage5 = $request->productImage5;


        $productImage1Name = $request->productImage1->getClientOriginalName();
        $productImage2Name = $request->productImage2->getClientOriginalName();
        $productImage3Name = $request->productImage3->getClientOriginalName();
        $productImage4Name = $request->productImage4->getClientOriginalName();
        $productImage5Name = $request->productImage5->getClientOriginalName();
        $imageFile = '/images/';
        $destinationDirectory = '/home/ethan/Documents/portfoliosite/public/images';

        if ($productImage1->move($destinationDirectory,  $productImage1Name) && $productImage2->move($destinationDirectory,  $productImage2Name) && $productImage3->move($destinationDirectory,  $productImage3Name) && $productImage4->move($destinationDirectory,  $productImage4Name) && $productImage5->move($destinationDirectory,  $productImage5Name)) 

        {
            Project::create(['projectName'=> $projectName,'projectLink'=> $projectLink,'projectImage1'=> $imageFile.$productImage1Name,'projectImage2'=> $imageFile.$productImage2Name,'projectImage3'=> $imageFile.$productImage3Name,'projectImage4'=> $imageFile.$productImage4Name,'projectImage5'=> $imageFile.$productImage5Name]);
            return redirect()->route('admin')->with('success');
        }
 

    }



    public function removeProjectCarousel(Request $request)

    {
        

        $project_carousel_image = Project::find($request->projectCarouselImageId);
        if($project_carousel_image){
            $project_carousel_image->delete();
            return redirect()->route('admin')->with('success');
        }

    }


    public function uploadResume(Request $request)

    {
        $folder = '/home/ethan/Documents/portfoliosite/public/cv'; // Path to your folder
        $files = scandir($folder);
        $files = array_diff($files, array('.', '..'));
        $fileCount = count($files); 
   
        if ($fileCount > 0) {
            foreach ($files as $file) {
                $filePath = $folder . '/' . $file;
                unlink($filePath);
            }
            
        } else {


 
        }

        $resume = $request->resume;
        $fileName = $resume->getClientOriginalName();
        $destinationDirectory = '/home/ethan/Documents/portfoliosite/public/cv';
        $folder = '/home/ethan/Documents/portfoliosite/public/cv';

        // Get all files in the folder
        $files = Storage::files($folder);
        
        if (empty($files)) {

            if ($resume->move($destinationDirectory,$fileName))
    
            {
                return redirect()->route('admin')->with('success');
            }
             
        } else {

                

        }

      

    }



}
