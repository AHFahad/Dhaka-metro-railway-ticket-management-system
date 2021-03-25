
        <link rel="stylesheet" href="style/headerStyle.css">
        <script>
          
             

        
            function colorNavlink(ok){
                
                 document.getElementsByClassName("link")[0].style.backgroundColor="";
                 document.getElementsByClassName("link")[1].style.backgroundColor="";
                 document.getElementsByClassName("link")[2].style.backgroundColor="";
                 document.getElementsByClassName("link")[3].style.backgroundColor="";
                document.getElementsByClassName("link")[ok].style.backgroundColor = "#4CAF50";
               
            }
        </script>
        <div class="header">
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a class="link"  onclick="colorNavlink(0)" href="CustomerHome.php">Home</a></li>
                    <li><a class="link"  onclick="colorNavlink(1)" href="buyTicket.php">buy ticket</a></li>
                    <li><a class="link" onclick="colorNavlink(2)" href="myTickets.php">My ticket</a></li>
                    <li><a class="link" onclick="colorNavlink(3)" href="contact.php">Contacts</a></li>
                    <li><a class="link" onclick="colorNavlink(4)" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
       
        
