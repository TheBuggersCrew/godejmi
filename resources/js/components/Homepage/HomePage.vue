<template>
    <div>
        <nav>
            <div class="headlineWrap">
                <h1>GODEJ<span>MI</span>.PL</h1>
                <div class="imgWrapper">
                    <img src="/img/godejmi-logo.png" alt="">
                </div>
            </div>
            <button>CLICK ;]</button>
        </nav>
        <section>
            <div class="element">
                <div class="imgPreview">
                    <img src="/img/godejmiPreview.png" alt="">
                </div>
                <p>Bejsikli normal godej mi. Znane lubiane zbugowane. Kliknij już teraz żeby zostać obrażonym. Super przezwiska. Fajne ksywy. Nowa pulla przewissk co tydzień</p>
            </div>
            <div class="shoutbox-wrapper">
                <Shoutbox />
            </div>  
        </section>
    </div>
</template>

<script>

import Shoutbox from "../Shoutbox/Shoutbox"

export default {
    components: {
        Shoutbox
    }
}

</script>

<style scoped>
    nav {
        display: flex;
        flex-direction: row;
        max-width: 1400px;
        margin: 0px auto 50px;
        justify-content: space-between;
        align-items: center;
    }
    .headlineWrap {
        display: flex;
        align-items: center;
    }
    h1 {
        font-size: 70px;
        letter-spacing: 15px;
        margin: 0;
        color: rgb(255, 0, 0, 0.67);
    }
    span {
        color: black;
    }
    div.imgWrapper {
        background-position: center;
        background-size: cover;
        width: 150px;
        height: 150px;
    }

    div.imgPreview {
        border: 1px solid #333
    }

    div img {
        max-width: 100%;
        max-height: 100%;
    }

    section {
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
        background-color: rgba(0,0,0,0.11);
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        max-width: 1400px;
        margin: 0 auto;
        padding: 25px;
    }

    div.shoutbox-wrapper {
        flex:3;
        height: 600px; 
        background-color: #ffffff;
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
        padding: 20px;
        border: 1px solid white;
    }

    div.element {
        flex:1;
        background:rgba(255,255,255,1);
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
        padding: 20px;
        height: 600px;
        border: 1px solid white;
        margin-right: 10px;
    }
    
    p {
        margin-top: 30px;
    }
    button {
        margin-right: 30px;
        width: 150px;
        background-color: rgb(255, 0, 0, 0.67);
        border-radius: 50px;
        border: none;
        padding: 10px 20px;
        color: white;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 700;
        transition: 0.2s;
    }
    button:hover {
        box-shadow: 0px 0px 10px 0px rgba(255, 0, 0, 0.67);
    }
</style>