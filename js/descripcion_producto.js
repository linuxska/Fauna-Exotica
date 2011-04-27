/*function Mostrar_Ocultar_Submenu()
{
var obj = document.getElementByClass('menu_vertical li');
if (obj.style.display == 'none')
    obj.style.display = 'block';
else
    obj.style.display = 'none';
}*/

    $(document).ready(function(){  
        $(".submenu li").click(function(e){  
            var a = e.target.id;  
            //desactivamos seccion y activamos elemento de menu  
            $(".submenu li.active").removeClass("active");  
            $(".submenu #"+a).addClass("active");  
            //ocultamos divisiones, mostramos la seleccionada  
            $(".content").css("display", "none");  
            $("."+a).fadeIn();  
        });  
    });  



