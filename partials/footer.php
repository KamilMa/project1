<footer>
        <div class="ui container custom">
            <div class="ui three column grid stackable">
                <div class="column">
                    <h3>Restauracja Thai Lo</h3>
                    <div class="ui list">
                        <div class="item">ul. Restauracyjna 41</div>
                        <div class="item">00-000 Warszawa</div>
                        <div class="item">tel: +48 0606-0660-0606</div>
                        <div class="item">e-mail: thailo@thailo.pl</div>
                    </div>
                </div>
                <div class="column">
                    <h3>Godziny otwarcia</h3>
                    <div class="ui list">
                        <div class="item">poniedziałek-czwartek 12:00-22:00</div>
                        <div class="item">piątek-sobota 11:00-02:00</div>
                        <div class="item">niedziela 12:00-21:00</div>
                        <div class="item">ZAPRASZAMY !</div>
                    </div>
                </div>
                <div class="column">
                    <h3>Dołącz do nas</h3>
                    <form class="ui form" action="">
                        <div class="field">
                            <input type="text" value="" name="newsletter" placeholder="twój email">
                            <label> Bądź na bieżąco z naszą ofertą</label>
                        </div>
                        <div class="social-icons">
                            <a href="#"><i class="facebook square icon"></i></a>
                            <a href="#"><i class="twitter square icon"></i></a>
                            <a href="#"><i class="google plus square icon"></i></a>
                            <a href="#"><i class="vimeo square icon"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="space30"></div>
        <div class="copyright text-center">
            <p>&copy; 2018 Thai Lo Restaurant</p>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <script src="js/animatescroll.js"></script>
    <script src="js/main.js"></script>

<?php
    // Show delete and edit buttons after login
    if (isset($_SESSION['logged'])) {
        if ($_SESSION['logged']==true && $_SESSION['role']==1) {
            echo'<script language="javascript" type="text/javascript">
                $(document).ready(function(){
                    $(".edit-menu").show();
                    $(".delete-menu").show();
                    $(".add-menu-span").show();
                    
                    $(".delete-post").show();
                    $(".edit-post").show();
                });
            </script>';
        }
    }
?>
</body>

</html>