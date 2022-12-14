<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No hay mensajes disponibles";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tú: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Desconectado ahora") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a style="margin-left:5px; margin-top:5px; display:flex;
        list-style: none;
        background-color: transparent;
        display: flex;
        align-items: center;
        width: 200%;
        border-radius: 6px;
        text-decoration: none;
        transition: var(--tran-03);

         " href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content" style="flex-direction: column;" >
                    <span class="image">
                    <img style="object-fit: cover; border-radius: 150%;
                    height: 50px; width: 50px;" src="../login/images/'. $row['img'] .'" alt="">
                    </span>

                    <div class="text logo-text">
                        <span class="name" style="display:flex;  height: calc(100% - 55pxpx);    transition: var(--tran-05);
                        margin-left:65px; margin-top:-60px!important">'. $row['fname']. " " . $row['lname'] .'</span>

                        <span class="profession" style="display:   height: calc(100% - 55pxpx);    transition: var(--tran-05);
                        flex; margin-left:65px; margin-top:1px!important ">'. $you . $msg .'</span>
                    </div>
                    </div>
                    <div style="display: flex;  " class="status-dot '. $offline .'"><i class="fa fa-circle"></i></div>
                </a>';
    }
?>
<!--Cuando -->
