<style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            position: relative;
            background-color: #26292C;
            background-image: url(images/pattern.jpg);
            background-size: cover;
            background-blend-mode: darken;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        body::before {
            content: "";
            position: fixed; /* Use fixed to cover the entire viewport */
            width: 100%;
            height: 100%;
            background-color: rgba(38, 41, 44, 0.5); /* Semi-transparent overlay */
            pointer-events: none; /* Allows interaction with underlying content */
            mix-blend-mode: multiply;
            z-index: -1;
        }

        @font-face {
            font-family: Irish Grover;
            src: url(fonts/IrishGrover.ttf);
        }

        @font-face {
            font-family: Ink Free;
            src: url(fonts/Inkfree.ttf);
        }

        a{
            text-decoration: none;
        }

        .nav{
            display: flex;
            justify-content: space-between;
            background-color: #1A1B1D;
            padding: 1.3%;
            padding-left: 3%;
            padding-right: 3%;
            box-shadow: 2px 6px 4px 0px rgba(0, 0, 0, 0.35);
            flex-wrap: wrap;
            z-index: 0;

        }

        ion-icon {
            --ionicon-stroke-color: white;
            --ionicon-fill-color: white;
            color: white;
            scale: 1.3;
        }

        .plus{
            color: white;
            scale: 1.3;
        }

        .footer{
            text-align: center;
            background-color: #1A1B1D;
            padding: 1.3%;
            box-shadow: -2px -4px 11px 3px rgba(0, 0, 0, 0.35);
            font-family: Ink Free;
            font-size: x-small;
            bottom: 0;
            position: fixed;
            width: 100%;
            z-index: 999999;
        }
        
        @media screen and (max-width: 768px){
            .nav{
                padding: 5%;
            }
            .plus{
                margin-left: 30px;
            }
            .footer{
                padding: 5%;
            }
        }
   </style>
   
   <div class="nav">
        <a href="index.php"><ion-icon name="calendar-outline" class="pen"></ion-icon></a>
        <a href="userindex.php"><ion-icon name="eye-outline" class="plus" style="scale:1.8;" tooltip="View Notes"></ion-icon></a>
        <a href="logout.php"><b style="color:white; font-family: Irish Grover;">Logout</b></a>
    </div>
   
    <footer>
        <p class="footer" style="color: white;">Copyright © 2023-24 - LazyWiz (@lazywiz609)</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
              document.querySelector('.pen').addEventListener('mouseover', function() {
            this.setAttribute('name', 'calendar');
        });
        document.querySelector('.pen').addEventListener('mouseout', function() {
            this.setAttribute('name', 'calendar-outline');
        });

        document.querySelector('.plus').addEventListener('mouseover', function() {
            this.setAttribute('name', 'eye');
        });
        document.querySelector('.plus').addEventListener('mouseout', function() {
            this.setAttribute('name', 'eye-outline');
        });
    </script>