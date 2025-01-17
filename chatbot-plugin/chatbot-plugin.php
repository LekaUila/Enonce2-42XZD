<?php
/**
 * Plugin Name:       Chatbot Plugin
 * Plugin URI:        
 * Description:       Chats about  neuroscience using an AI
 * Version:           1.0
 * Requires at least: 
 * Requires PHP:      7.2
 * Authors:           Clemence Millord, Charles Bretton, Liam Flandrinck
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       chatbot-plugin
 * Domain Path:       /languages
 **/
function create_chat()
 {
    return ' 

    <div id="global_div" style="margin: auto; text-align: center;">
    <div id="msg_div" style="
    margin: auto; width: 80%;
    border: solid #080708; padding-top: 1%; padding-bottom: 1%; text-align: left; scroll-behavior: auto;
    overflow-y: scroll;
    height: 600px;
    ">
<!--###################################################################################-->
<!--###################################################################################-->
<!--###################################################################################-->
<!--                                      JAVASCRIPT                                   -->
<!--###################################################################################-->
<!--###################################################################################-->
<!--###################################################################################-->
<div style="display: inline; font-size: medium; font-weight: bold; font-style: italic;"></div>
        <script>

        var rgb_on = false;

            function addElement (user, text, backgroundColor, left, border_radius) {
                console.log("addElement launch");
            // crée un nouvel élément div
            var newDiv = document.createElement("div");
            // et lui donne un peu de contenu
            /*
            var newContent = document.createTextNode(user + " : " + text);
            // ajoute le nœud texte au nouveau div créé
            newDiv.appendChild(newContent);*/

            // ajoute le nouvel élément créé et son contenu dans le DOM
            var currentDiv = document.getElementById("after_msg_div");
            var currentDivcontainer = document.getElementById("msg_div");
            currentDivcontainer.insertBefore(newDiv, currentDiv);

            newDiv.innerHTML = "<div style=\"max-width: 300px; display: inline-block; background-color: " + backgroundColor +"; border: black solid 1px; border-radius:" + border_radius + "; padding-left: 2%; padding-right: 2%; padding-top: 1%; padding-bottom: 1%;\"><div style=\"display: inline; font-size: medium; font-weight: bold; font-style: italic;\">" + user + "</div><br>" + text + "</div>";
            if (left)
            {
                newDiv.style.textAlign = "left";
            }
            else
            {
                newDiv.style.textAlign = "right";
            };


/*
            newDiv.style.display = "inline-block";
            newDiv.style.border = "black solid 1px";
            newDiv.style.color = "white";
            newDiv.style.backgroundColor = backgroundColor;

            newDiv.style.borderRadius = "30px";
            newDiv.style.marginTop = "1%";
            newDiv.style.marginBottom = "1%";
            newDiv.style.padding = "1%";
            newDiv.style.paddingLeft = "2%";
            newDiv.style.paddingRight = "2%";*/
            }

            function print_user_message() {
                console.log("print_user_message launch");
                var text_input = document.getElementById("input_user");
                var txt = text_input.value;
                addElement("you", txt, "#3772FF", false, "30px 0px 0px 30px");
            }

            function getRandomInt(max) {
                return Math.floor(Math.random() * max);
}

            function rgb_lol () {
                console.log("change lol launch");
                var div_to_change = document.getElementById("msg_div");

                if (rgb_on)
                {
                    div_to_change.style.backgroundColor = "rgb(" + getRandomInt(255) + ","+ getRandomInt(255) +","+getRandomInt(255)+")";
                }
                else
                {
                    div_to_change.style.backgroundColor = "white";
                }
            }
            function change_rgb_mode () {

                console.log("change rgb mode launch");
                if (rgb_on)
                {
                    rgb_on = false;
                }
                else
                {
                    rgb_on = true;
                }
            }

            function print_ia_message() {
                console.log("print_ia_message launch");
                var text_input = document.getElementById("input_user");
                var txt = text_input.value;
                


                //Fichier PHP script.php
                //Code JavaScript
                var requete = new XMLHttpRequest();
                requete.open("POST", "wp-content/plugins/testfl.php");
                requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                requete.send("prompt=" + txt);
                requete.onload = function() {
                //La variable à passer est alors contenue dans l\'objet response et l\'attribut responseText.
                var variableARecuperee = this.responseText;
                addElement("AI", variableARecuperee, "#DF2935", true, "0px 30px 30px 0px");
                scroll_bottom();
                };
                //requete.open(get, script.php, true); //True pour que l\'exécution du script continue pendant le chargement, false pour attendre.
                //requete.send();




            }
            function scroll_bottom(params) {
                console.log("scroll_bottom launch");
                element = document.getElementById("msg_div");
                element.scrollTop = element.scrollHeight;
            }

            function send_rick_roll ()
            {
                console.log("addElement launch");
            // crée un nouvel élément div
            var newDiv = document.createElement("div");
            // et lui donne un peu de contenu
            newDiv.innerHTML = "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>";
            // ajoute le nouvel élément créé et son contenu dans le DOM
            var currentDiv = document.getElementById("after_msg_div");
            var currentDivcontainer = document.getElementById("msg_div");
            currentDivcontainer.insertBefore(newDiv, currentDiv);
            /*
            newDiv.style.width = "560";
            newDiv.style.height = "315";
            newDiv.title = "YouTube video player";
            newDiv.src = "https://www.youtube.com/embed/dQw4w9WgXcQ";
            //frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
            */
            }

            function send_message() {
                console.log("send_message launch");
                print_user_message();
                print_ia_message();
                //send_rick_roll();
                var text_input = document.getElementById("input_user");
                text_input.value = "";
                scroll_bottom();
            }


            window.addEventListener("load", function () {
                

                setInterval("rgb_lol()", 1);
            });
        </script>
        <img src="wp-content/plugins/help_button.png" onclick="send_rick_roll()" style="width: 30px; margin-left: 1%; margin-bottom: 1%;">
        <div id="after_msg_div"></div>

    </div>
<!--###################################################################################-->
<!--###################################################################################-->
<!--###################################################################################-->
<!--                                      INTERFACE                                   -->
<!--###################################################################################-->
<!--###################################################################################-->
<!--###################################################################################-->



    <div id="input_div" style="line-height: 0%; margin: auto; text-align: right; width: 80%; padding: 0%; border: solid #080708; background-color: #F1BF98;">

        <input type="text" placeholder="enter your question" id="input_user" style="border: none; background-color: #F1BF98; display: inline-block; width: 80%; margin: 0%; padding-top: 10px; padding-bottom: 10px;"><button onclick="send_message()" style="border: none; display: inline-block; width: 18%; margin: 0%; background-color: #DF2935; padding-top: 10px; padding-bottom: 10px;">Send</button> 

    </div>
    <div id="lol_div" style="line-height: 0%; margin: auto; text-align: centre; height: 32px; width: 80%; padding: 0%; border: solid #080708; background-color: #F1BF98;">

        <button onclick="change_rgb_mode()" style="width:  100%; border: none; display: inline;  background-color: #DF2935; padding-top: 10px; padding-bottom: 10px;">RGB</button>
 
    </div>
    ';
 }

 add_shortcode( 'chatbot', 'create_chat' );

 function test_func () {
    return 
    'test success';
 }

 add_shortcode( 'test', 'test_func' );

?>