const app =document.getElementById('typewriter');

const typewriter = new Typewriter(app,{
    loop: true,
    delay: 75
});

typewriter
.typeString('Por mi raza hablará el espíritu')
.pauseFor(200)
.start();

