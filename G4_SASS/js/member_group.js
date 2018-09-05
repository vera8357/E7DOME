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



        function show_headerdropdown() {
            var link_member = document.getElementById('link_member');
            if (link_member.innerHTML == '登入') {
                document.getElementsByClassName('headerdropdown')[0].style.display = 'none';
            } else {
                document.getElementsByClassName('headerdropdown')[0].style.display = 'block';
            }
        }
        function exit() {
            document.getElementsByClassName('headerdropdown')[0].style.display = 'none';
        }
        function init(){

            $id('show_leader').onclick = show_leader;
            $id('show_staff').onclick = show_staff;
            if (document.body.clientWidth > 768) {
                $id('bar').onmouseover = show_headerdropdown;

                $id('bar').onmouseout = exit;
            }
        }


        
        window.onload = init;