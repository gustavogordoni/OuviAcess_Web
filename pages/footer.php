<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
  <div class="col d-flex align-items-center">
    <span class="text-muted fs-5 text-center mx-auto">©2023 Desenvolvido pelos alunos Gustavo Luiz Gordoni e Thiago Ferreira Caires</span>
  </div>
</footer>

<!-- Jquery needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Function used to shrink nav bar removing paddings and adding black background -->  
    <script src="../scrits/script.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
  </body>
</html>