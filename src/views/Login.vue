<template>

    <div class="bg">
        <div class="card">

            <h2 class="card-title">Enter your Reference</h2>  

            <input type="text" placeholder="Enter your CIN">

            <router-link to="/Reservation" tag="button" class="submit-btn"> Log-In </router-link>
        
        </div>
    </div>

</template>

<script>
export default {
    name: 'Login'
}
</script>

<style scoped>

    .card {
        width: 35rem;
        height: 19rem;
        padding: 3%
    }

    .bg{
        background-color: blue;
        padding: 12% 32%;
        height: 100vh
    }

    .card-title{
        font-family: 'Oswald', sans-serif;
        font-size: 35px;
        font: bold;
        margin-top: 4vh
    }

    input {
        width: auto;
        padding: 12px 20px;
        margin: 8px 10px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red
    }

    .submit-btn{
        background-color: rgb(43, 64, 180);
        border-radius: 4px;
        font: bold;
        font-size: 20px;
        margin: 0 30%;
        color: rgb(255, 255, 255);
        transition-duration: 0.4s;
        padding: 12px 32px;
        text-decoration: none;
        cursor: pointer;
        margin-top: 4vh;
        margin-bottom: 4vh;
        width: 40%
    }

    .submit-btn:hover {
        background-color: #ffffff; 
        border-color: rgb(43, 64, 180);
        color: rgb(43, 64, 180)
    }
</style>
