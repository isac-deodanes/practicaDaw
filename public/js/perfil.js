let abrirPerfil = document.getElementById("perfil")
let cardPerfil = document.querySelector('.card-perfil')

// cardPerfil.style.display = 'none'


abrirPerfil.addEventListener('click',()=>{
   event.stopPropagation(); 
     return cardPerfil.style.display = 'block'
    
})

document.addEventListener('click',(event)=>{
  
    if (!cardPerfil.contains(event.target)) {
        return cardPerfil.style.display = 'none'
        
    }
})
