<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>

<link href="<?php echo base_url(); ?>assets/theme/css/boots.css" rel="stylesheet" type="text/css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      
        <iframe id="iframeYoutube" width="560" height="315"  src="https://www.youtube.com/embed/e80BbX05D7Y" frameborder="0" allowfullscreen></iframe> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="sec-header2">

                        <img src="<?php echo base_url(); ?>assets/theme/img/blog_video_category_header.png">       
                        <h1>VIDEO</h1>
                        <!-- <h3>EVENT | 30 JULI 2018</h3> -->
                </div>

                <div class="clear-float"></div>


                <section class="sec-blog">
                    
                    <!-- <div class="breadcumb">
                        <div class="kiri">
                            <h2>WISATA</h2>
                        </div>
                        <div class="kanan">

                            <ul>
                                <li>Category</li>
                                <li>
                                    <select class="sort-article">
                                        <option value="0">Semua:</option>
                                        <option value="1">Audi</option>
                                        <option value="2">BMW</option>
                                        <option value="3">Citroen</option>
                                        <option value="4">Ford</option>

                                    </select>
                                </li>
                            </ul>
                            
                            
                        </div>
                        <div class="clear-float"></div>
                    
                    </div> -->

                    <div class="widget2">
                        <?php
                            if (count($video) > 0) {
                                $n=1;
                                foreach ($video as $key => $value) {
                                     if($n == 3 OR $n == 6 OR $n == 9 OR $n == 12){
                                        $mrnone = "mrnone";
                                    }else{
                                        $mrnone = "";
                                    }
                        ?>
                                <div class="cols2 <?php echo $mrnone; ?>">
                                    <a href=""><img src="https://img.youtube.com/vi/<?php echo $value->id_embed; ?>/mqdefault.jpg"></a>
                                    <a onclick="changeVideo('<?php echo $value->id_embed; ?>')"><span class="playbutton">
                                        <img src="<?php echo base_url(); ?>assets/theme/img/buttonplay.png">
                                    </span></a>
                                    <div class="cols-sum-whitout-box-shadow">
                                        <div class="title-content"><a href=""><?php echo $value->title; ?></a></div>
                                     
                                        
                                    </div>
                                </div>
                        <?php
                                $n++;
                                }
                            }
                        ?>
                    
                        <div class="clear-float"></div>
                    </div>
                </section>

                
                
            <section class="sec-blog-join">
                    <div class="join-text">
                        <div class="join-title">
                            <h2>BERGABUNG BERSAMA</h2>
                            <h2>BALAD GURILAPS</h2>
                            <div class="join-p">
                                <p>
                                    These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.

                                </p>
                            </div>
                            <div class="button">
                                    <a href="" class="button-daftar orange">DAFTAR</a>
                            </div>
                        </div>
                    
                    </div>
                </section>
<!-- JAVA SCRIPT BUAT SELECTION -->

<script type="text/javascript">
    var x, i, j, selElmnt, a, b, c;
/look for any elements with the class "custom-select":/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /for each element, create a new DIV that will act as the selected item:/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /for each element, create a new DIV that will contain the option list:/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect); 
</script>
<script type="text/javascript">$(document).ready(function(){
  $("#myModal").on("hidden.bs.modal",function(){
    $("#iframeYoutube").attr("src","#");
  })
})

function changeVideo(vId){
  var iframe=document.getElementById("iframeYoutube");
  iframe.src="https://www.youtube.com/embed/"+vId;

  $("#myModal").modal("show");
}</script>