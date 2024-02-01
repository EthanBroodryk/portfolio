<script>

export default {

    props:{
   
        propName: {
            type: Array,
            required: true,
        },

        categoryDropdown :{

            type:Array,
            required:true,

        },

        cartItems :{

            type:Array,
            required:true,

        },

    },

    data(){

        return {

            mobileMenuOpen:false,
            gategoryDropdown:false,
            searchBar:false,
            links:[],
            cartItemCount:0,

        }
    },

    setup(){

    },

    computed: {
  
    },

    mounted(){
        this.cartItemCount = localStorage.getItem('cartItemCount')
    },

    methods:{

    

        toggleButton(){
            if(this.mobileMenuOpen == false){
                this.mobileMenuOpen = true
            }else{
                this.mobileMenuOpen = false
            }
        },
        toggleCatButton(){
            if(this.gategoryDropdown == false){
                this.gategoryDropdown = true
                console.log('catebutton',this.gategoryDropdown)
            }else{
                this.gategoryDropdown = false
                console.log('catebutton',this.gategoryDropdown)
            }
        },
        toggleSearchButton(){
            if(this.searchBar == false){
                this.searchBar = true
            }else{
                this.searchBar = false
            }
        },
    }
}
</script>

<template>
    <!--Top Navigation-->
    <nav class="fixed flex flex-row justify-between items-center bg-white border-b w-full p-2 z-10">
        <button @click="toggleButton" type="submit" class="ml-2 p-2 bg-gray-600 hover:bg-cyan-500 rounded-full">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <!--Logo-->
        <div class="mx-auto">
            <span class="text-gray-400 font-bold">Ethan</span>
            <span class="text-cyan-400 font-bold ml-2">Broodryk</span>
        </div>

    </nav>
    <!--Side nav-->
    <div v-if="mobileMenuOpen" class="h-screen fixed bg-gray-600 flex flex-col w-40 py-8 mt-14 rounded items-center z-10">
    <li v-for="(route, index) in propName" :key="index" class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-gray-600 w-full text-center">
        <a :href="route">{{ route }}</a>
    </li>
    <li  class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-gray-600 w-full text-center">
        <a href="#proficiencies">Proficiencies</a>
    </li>
    <li  class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-gray-600 w-full text-center">
        <a href="#projects">Projects</a>
    </li>
    <li  class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-gray-600 w-full text-center">
        <a href="#contact">Contact Me</a>
    </li>
    <li  class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-gray-600 w-full text-center">
        <a href="#github">  github</a>
    </li>


  
    <!-- <div @click="toggleCatButton" class="border-b border-white p-2 hover:bg-cyan-500 hover:text-white active:bg-violet-700 text-white bg-black w-full">Categories <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12.18l-4.94-4.95-1.41 1.41L10 14l6.36-6.36-1.41-1.41L10 12.18z"/></svg></div> -->
    <!-- <li v-if="gategoryDropdown" v-for="(category, index) in categoryDropdown" :key="index" class="p-2 hover:bg-gray-600 hover:text-white active:bg-violet-700 text-white bg-black w-full">
        <a :href="category">{{category.name}}</a>
    </li> -->
</div>

</template>

