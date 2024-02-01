<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm,usePage } from '@inertiajs/vue3';


//courousel

const form = useForm({
  
  carouselImage:null,


})

const submit = () => {

  form.post(route('addCarouselImage'));

};

//project images

const projectform = useForm({
  
    projectName:null,
    projectLink:null,
    productImage1:null,
    productImage2:null,
    productImage3:null,
    productImage4:null,
    productImage5:null,

})

const resumeform = useForm({

   resume:null,

})



const submitProject = () => {

  console.log('yeah')
  projectform.post(route('addProjectPic'));
  
}


const submitResume = () => {

  resumeform.post(route('uploadResume'));

}


</script>

<script>
import Navbar  from '@/Components/Navbar.vue';
export default {

    components: {
        Navbar,
    },

    props:{

      carouselImages:[],
      projectImages:[],
      resume:String

    },

    data(){

        return {

            routes:[

                'Admin',
                'Experience',
                'Full-Stack Skills',
                'More About Me',
                'Reviews',
                'Ecommerce'

            ]
        }

    },

    setup(){

    },

    computed:{

    },

    mounted(){

      console.log("TARGET",this.projectImages)

    },

    methods:{

   
    }

        
}

</script>
<template>

<Navbar :propName="routes" :categoryDropdown="categories"></Navbar>
<!--Add Images For Carousel-->
  <div class="flex flex-col">
    <div class="flex items-center justify-center p-12">
      <div class="mx-auto w-full max-w-[550px] bg-white">
        <form @submit.prevent="submit" class="py-6 px-9">
          <div class="mb-5">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]"> Upload Carousel image
            <input required type="file" @input="form.carouselImage = $event.target.files[0]"
            class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] w-full"
            />
            </label>
          </div>
          <div class="mb-6 pt-4">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">
            Upload File
            </label>
            <button type="submit" class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none bg-cyan-500">
            Send File
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--Remove carousel images-->
  <div class="flex flex-col">
    <div class="flex items-center justify-center p-12">
      <div class="mx-auto w-full max-w-[550px] bg-white">
        <label class="ml-7 mb-5 block text-xl font-semibold text-[#07074D]">Remove Carousel image</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3 gap-2 px-4">
          <div v-for="(image,index) in carouselImages"  :key="index" class="mx-auto  rounded-xl shadow-md overflow-hidden md:max-w-2xl">
             <img class="w-40 h-40 object-cover md:h-48 md:w-48  px-4 py-4" :src="image.image_file_name" alt="Modern building architecture">
             <Link  class="mt-2 px-2 py-2 bg-red-500 text-white rounded-md" :href="route('removeCarouselImage')" method="post"  :data="{carousel_id:image.id}">Delete</Link>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Add Project images to carousel-->

  <div class="w-full bg-black">
        <label class="flex flex-row justify-center text-white  text-4xl p-8">Upload Project Images</label>
        <form @submit.prevent="submitProject" class="max-w-md mx-auto  p-8">
            <div class="relative z-0 w-full mb-5 group">
                <input v-model="projectform.projectName" type="text" name="userEmail" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Project Name</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input v-model="projectform.projectLink" type="text" name="userEmail" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Project Link</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input required type="file" class="text-white" @input="projectform.productImage1 = $event.target.files[0]"/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input required type="file" class="text-white" @input="projectform.productImage2 = $event.target.files[0]"/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input required type="file" class="text-white" @input="projectform.productImage3 = $event.target.files[0]"/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input required type="file" class="text-white" @input="projectform.productImage4 = $event.target.files[0]"/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input required type="file" class="text-white" @input="projectform.productImage5 = $event.target.files[0]"/>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
      
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>


    <!--Remove Project Images-->

  <div class="w-full bg-white mx-auto">
      <label class="flex flex-row justify-center text-black  text-4xl p-8">Remove Project Carousel</label>
      <div class="flex flex-col items-center justify-center">
        <div v-for="(image, index) in projectImages" :key="index" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3 gap-2 p-8 border-b">
          <img class="w-20 h-20 p-2" :src="image.projectImage1" alt="Project Image 1">
          <img class="w-20 h-20 p-2" :src="image.projectImage2" alt="Project Image 2">
          <img class="w-20 h-20 p-2" :src="image.projectImage3" alt="Project Image 3">
          <img class="w-20 h-20 p-2" :src="image.projectImage4" alt="Project Image 4">
          <img class="w-20 h-20 p-2" :src="image.projectImage5" alt="Project Image 5">
          <Link  class="mt-2 px-2 py-2 bg-red-500 text-white rounded-md" :href="route('removeProjectCarousel')" method="post"  :data="{projectCarouselImageId:image.id}">Delete</Link>
        </div>
      </div>
  
  </div>


  <!--Manage cv-->
  <div class="w-full bg-black">
      <label class="flex flex-row justify-center text-white  text-4xl p-8">Upload Resume</label>
      <form @submit.prevent="submitResume" class="max-w-md mx-auto  p-8">
          <div class="relative z-0 w-full mb-5 group">
              <input required type="file" class="text-white" @input="resumeform.resume = $event.target.files[0]"/>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
  </div>


</template>

