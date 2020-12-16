
<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">FAQ</a>
            </li>
        </ul>
    </div>
    &copy; <?php echo date('Y');?> <a href="" target="_blank">UTONE</a>. All Rights
    Reserved.
</footer>
</div>
<?php // include('sidebar_right.php');?>
<script>
    $(".content").css("min-height",$(window).height());

    setInterval(function(){
      $.ajax({
          type: "POST",
          url: '<?php echo base_url('checklogin') ?>',
          success: function (data) {
              if(data==0) {
                window.location.href = '<?php echo base_url() ?>';
              }
          }
      });
    }, 10000);
</script>

<?php
if(!empty($_SESSION['CurrentLogin']['ChatID'])){
?>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/<?php echo $_SESSION['CurrentLogin']['ChatID'];?>/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<?php }?>

</body>

</html>
