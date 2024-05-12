window.events = new Vue();
//
window.next = function () {
    window.events.$emit('next');
};


let app = new Vue({
    data: {
        wylogujshow:false,
    },
    el: '#app',
    created() {
    
    },
    methods: {

        test(){
            console.log('afsdsdf');
        }
     


    }
})