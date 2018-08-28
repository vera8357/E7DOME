function $id(id){
    return document.getElementById(id);
    }   
        function show_leader(){
            $id('leader_content').style.display = 'block';
            $id('show_leader').style.backgroundColor = "rgba(255,255,255,.8)";
            $id('show_leader').style.color = "#000";
            $id('staff_content').style.display = 'none';
            $id('show_staff').style.backgroundColor = "#022084";
            $id('show_staff').style.color = "#fff";

        }

        function show_staff(){
            $id('leader_content').style.display = 'none';
            $id('show_leader').style.backgroundColor = "#022084";
            $id('show_leader').style.color = "#fff";
            $id('staff_content').style.display = 'block';
            $id('show_staff').style.backgroundColor = "rgba(255,255,255,.8)";
            $id('show_staff').style.color = "#000";
        }




        function init(){

            $id('show_leader').onclick = show_leader;
            $id('show_staff').onclick = show_staff;
        
        }


        
        window.onload = init;