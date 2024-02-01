<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';


const submit = () => {

    
    form.post(route('sendmail'));
   

};


const form = useForm({
    userContactNumber:null,
    userEmail: null,
    emailBody: null,
})

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
        resume:String,
        

    },

    data(){

        return {

            pdfUrl: '/cv/' + this.resume,
            i :1,
            firstProjectImage:true,
            projectImageTarget:null,
            projectImagesIndex:false,
            host:'http://localhost:5173/',
            currentIndex:0,
            currentIndexProject:0,
            intervalId: null,
            carouselImageLimit:0,
            projectImageLimit:0,
            routes:[
                'Admin', 
            ],
 
            
         
        }

    },

    setup(){

    },

    computed:{

    currentProjectImage(){

        if(this.projectImages.length > 0){

            return this.projectImages[this.currentIndexProject]

        }

    },


    currentProjectImage2(){

            if(this.projectImages.length > 0){

                return this.projectImages[this.currentIndexProject]

            }

     },

    currentImage() {
        if(this.carouselImages.length > 0){

            return this.carouselImages[this.currentIndex].image_file_name

        }

    },

    },

    mounted(){
        console.log('poes',this.resume)
      
        this.projectImagesIndex = this.projectImages.length - 1
        this.startRotation()
        this.carouselImageLimit = this.carouselImages.length
        this.projectImageLimit  = this.projectImages.length
     

    },

    methods:{

     

        getFullLink(link) {
        // Check if the link already contains a protocol
        if (!/^https?:\/\//i.test(link)) {
            // If not, prepend 'http://' to the link
            return 'http://' + link;
        }
        return link;
    },

        nextProjectImage(index){

            if(this.projectImagesIndex != index){
                this.i = 1

            }
        

            if(this.i < 5){
                this.i+=1
            }
         
            this.projectImagesIndex = index
            console.log('THE INDEX',this.projectImagesIndex,'projectimage', this.projectImageTarget)

       

        },

        prevProjectImage(index){

            if(this.i > 1){
                this.i -= 1
            }
         
            this.projectImagesIndex = index
            console.log('THE INDEX',this.projectImagesIndex,'projectimage', this.projectImageTarget)

        },



           //carousel functions
           startRotation() {
            // Rotate every 3 seconds (adjust the time as needed)
            this.intervalId = setInterval(() => {
                this.nextImage();
            }, 1000);
        },


        nextImage(){

            if(this.currentIndex < (this.carouselImageLimit -1)){
                this.currentIndex +=1
            }else{
                this.currentIndex = 0
            }
    
        },

            previouseImage(){

                if(this.currentIndex > 0){
                    this.currentIndex -=1
                }

            },

    } 

}

</script>

<template>
    
    <Navbar :propName="routes" :categoryDropdown="categories"></Navbar>
    <!--Skills Carousel-->
    <div class="py-4 px-4 pt-20">
        <div class="max-w-md mx-auto bg-white rounded-xl  shadow-2xl overflow-hidden md:max-w-2xl">
            <div class="md:flex">
                <div class="md:shrink-0">
                    <img class="w-60 h-60 object-cover md:h-60 md:w-60 rounded-full  px-4 py-4" :src="currentImage" alt="No Image Available"> 
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-2xl text-black font-serif">Nothing Is Ever Impossible...</div>
                    <a href="#" class="block mt-1 text-lg text-xl font-serif leading-tight font-medium text-cyan-500 hover:underline">If You Can Think It ... I can Code It !!</a>
                    <p class="mt-2 text-slate-500"></p>
                </div>
            </div>
        </div>
    </div>

    <!--Skills -->
    <div id="proficiencies" class="bg-black w-full">
        <label class="flex flex-row justify-center text-white mb-20  text-4xl p-4">PROFICIENCIES:</label>
        <div class="grid grid-cols-2 lg:grid-cols-4 lg:ml-20 ml-10 shadow-md bg-black shadow-md rounded-xl">
            <img class="p-2 w-24 h-24 object-cover mb-2 rounded-full" v-for="(image, index) in  carouselImages" :key="index" :src="image.image_file_name">
        </div>
    </div>

    <!--Project carousel-->
    <label class="flex flex-row justify-center text-black  text-4xl p-8 z-0 ">PROJECTS:</label>
    <div id="projects" class="relative overflow-hidden p-8 z-0 " v-for="(image,index) in projectImages">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl overflow-hidden md:max-w-2xl">
            <div class="md:flex z-0 ">
                <div class="mx-auto relative z-0 ">
                    <a class="flex flex-row justify-center text-teal-500" :href="getFullLink(image.projectLink)">{{ image.projectLink }}</a>
                    <button @click="prevProjectImage(index)" class="absolute bottom-1 left-0 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-l z-0 ">
                    &lt; Prev
                    </button>
                    <img :src="image.projectImage1" v-if="this.i == 1 || this.projectImagesIndex != index" alt="No Image Available" class="w-60 h-60 object-cover md:h-60 md:w-60  px-4 py-4 mb-20 mx-auto z-0"/>
                    <img :src="image.projectImage2" v-if="this.projectImagesIndex == index && this.i == 2" alt="No Image Available" class="w-60 h-60 object-cover md:h-60 md:w-60  px-4 py-4 mb-20 mx-auto z-0"/>
                    <img :src="image.projectImage3" v-if="this.projectImagesIndex == index && this.i == 3" alt="No Image Available" class="w-60 h-60 object-cover md:h-60 md:w-60  px-4 py-4 mb-20 mx-auto z-0"/>
                    <img :src="image.projectImage4" v-if="this.projectImagesIndex == index && this.i == 4" alt="No Image Available" class="w-60 h-60 object-cover md:h-60 md:w-60  px-4 py-4 mb-20 mx-auto z-0"/>
                    <img :src="image.projectImage5" v-if="this.projectImagesIndex == index && this.i == 5" alt="No Image Available" class="w-60 h-60 object-cover md:h-60 md:w-60  px-4 py-4 mb-20 mx-auto z-0"/>
                    <button @click="nextProjectImage(index)" class="absolute bottom-1 right-0 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-r">
                    Next &gt;
                    </button>
                </div>
            </div>
        </div>
    </div> 

    

    <!--CV-->
    <label class="flex flex-row justify-center text-white  text-4xl p-2 bg-black">My Resume:</label>
    <div class="w-full bg-black flex flex-row justify-center">
        <div class="mx-auto">
            <iframe :src="pdfUrl" width="350px" height="400px" frameborder="2"></iframe>
            {{ this.pdfUrl }}
        </div>
        <!-- <div>
    <a :href="pdfUrl" download="resume.pdf">Download My Resume</a>
  </div> -->
    </div>

    <!--contact form-->


    <div id="contact" class="w-full bg-black">
        <label class="flex flex-row justify-center text-white  text-4xl p-8">Contact Me:</label>
        <form @submit.prevent="submit" class="max-w-md mx-auto  p-8">
            <div class="relative z-0 w-full mb-5 group">
                <input v-model="form.userEmail" type="text" name="userEmail" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input v-model="form.userContactNumber" type="text" name="userContactNumber" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter Your Contact Number</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea v-model="form.emailBody" name="emailBody" id="emailBody" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required></textarea>
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compose Your Email Here:</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <!--Footer-->
    <footer id="github" class="bg-gray-800 text-white py-6">
        <div class="container mx-auto flex items-center justify-center">
            <div class="flex items-center space-x-4">
                <span>github:</span>
                <!-- Add GitHub icon with your GitHub link -->
                    <a href="https://github.com/EthanBroodryk" class="text-gray-400 hover:text-white">
                        <svg class="h-5 w-5" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                        </svg>
                    </a>
            </div>
        </div>
        <!-- Copyright notice -->
        <div class="mt-4 text-center text-gray-400">
            &copy; 2024 EthanAnthonyBroodryk. All rights reserved.
        </div>
    </footer>



</template>

