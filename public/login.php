<?php
session_start();

if (isset($_SESSION['zalogowany'])) {
    header('location:/');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj</title>
</head>
<body>


<div id="app">
<!-- <label for="">Login</label> -->
<!-- <input type="text" v-model="login"> -->
<label for="">Haslo</label>
<input type="password" v-model="password">

<button @click="zaloguj">Zaloguj</button>


<p><b>{{error}}</b></p>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<script>
let app = new Vue({
    el:'#app',
    data:{
        login:'',
        password:'',
        error:'',
        testdata:''
    },
    mounted(){
        let self = this;

        document.onkeydown = (evt) => {
            if(evt.key == 'Enter'){
                self.zaloguj()
            }
        }
    },
    methods:{
        zaloguj(){
            let self = this;
            try{
            axios.post('api/zaloguj.php',{login:this.login,password:this.password}).then((res)=>{
                console.log(res.data.length);

                if(res.data.trim() == 'ZALOGOWANY'){
                    console.log('JOŁ JOŁ ZALOGOWANY');
                   location.reload();
                }else if(res.data.trim() == 'NOCONNECTION'){
                    self.error = 'BRAK POŁĄCZENIA';
                }else if(res.data.trim() == 'BADLOGIN'){
                    self.error = 'Zły login lub hasło';
                    
                }else{
                    self.error = 'Wystąpił jakiś błąd';
                }
            })

            }catch(e){
                self.error = e;
            }

        }
    }
})

</script>
</body>
</html>