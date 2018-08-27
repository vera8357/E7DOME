function $id(id){
    return document.getElementById(id);
    }   
        function show_leader(){
            $id('leader_content').style.display = 'block';
            $id('staff_content').style.display = 'none';

        }

        function show_staff(){
            $id('leader_content').style.display = 'none';
            $id('staff_content').style.display = 'block';
        }




        function init(){

            $id('show_leader').onclick = show_leader;
            $id('show_staff').onclick = show_staff;
        
        }


        
        window.onload = init;