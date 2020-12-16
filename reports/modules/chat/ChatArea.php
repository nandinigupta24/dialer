<div class="table-responsive">
    <div class="app-inner-layout__top-pane">
        <div class="pane-left">
            
<!--            <div class="avatar-icon-wrapper mr-2">
                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                <div class="avatar-icon avatar-icon-xl rounded"><img width="82" src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user6-128x128.jpg" alt=""></div>
            </div>-->
            <h4 class="mb-0 text-nowrap"><?php echo (!empty($ChatDetails[0]['first_name']) && $ChatDetails[0]['first_name']) ? $ChatDetails[0]['first_name'].' '.$ChatDetails[0]['last_name'] : 'Not Available';?>
                <div class="opacity-7">Last Message: <span class="opacity-8"><?php echo time_elapsed_string($End['message_time']);?></span></div>
            </h4>
        </div>
        <div class="pane-right">
            <?php if($ChatDetails[0]['status'] == 'LIVE'){?>
                <button class="btn btn-success">LIVE</button>
            <?php }else{?>
                <button class="btn btn-danger">DROP</button>
            <?php }?>
            <!--<i class="fa fa-star ml-3 mr-3"></i>--> 
            <!--<i class="fa fa-clock-o mr-3"></i>--> 
            <!--<i class="fa fa-check"></i>-->

        </div>
    </div>
    <div class="chat-wrapper">
        
        <?php
                                                foreach ($ChatConversation as $conversation) {
                                                    $str = strpos($conversation['poster'], '.');
                                                    if ($str === false) {
                                                        ?>
        <div class="chat-box-wrapper">
            <div>
                <div class="avatar-icon-wrapper mr-1">
                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                    <div class="avatar-icon avatar-icon-lg rounded">
                        <img src="https://static-v.tawk.to/a-v3/images/default-profile.svg" alt=""></div>
                </div>
            </div>
            <div>
                <div class="chat-box"><?php echo $conversation['message']; ?></div>
                <small class="opacity-6">
                    <i class="fa fa-calendar-alt mr-1"></i>
                    <?php echo date('H:i A', strtotime($conversation['message_time'])); ?> | <?php echo date('Y-m-d', strtotime($conversation['message_time'])); ?>
                </small>
            </div>
        </div>
                                                        <?php
                                                    } else {
                                                        ?>
<div class="" style="float:right;width:100%;">
        <div class="float-right">
            <div class="chat-box-wrapper chat-box-wrapper-right">
                <div>
                    <div class="chat-box"><?php echo $conversation['message']; ?></div>
                    <small class="opacity-6">
                        <i class="fa fa-calendar-alt mr-1"></i>
                        <?php echo date('H:i A', strtotime($conversation['message_time'])); ?> | <?php echo date('Y-m-d', strtotime($conversation['message_time'])); ?>
                    </small>
                </div>
                <div>
                    <div class="avatar-icon-wrapper ml-1">
                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                        <div class="avatar-icon avatar-icon-lg rounded"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRumEwFb_UY_RiySjTt2Q9pQag59MEF9zS8p5YJn0fDfD5Setl&s" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!--                                                        <div class="direct-chat-msg mb-30">
                                                            <div class="clearfix mb-15">
                                                                <span class="direct-chat-name"><?php echo $conversation['chat_member_name']; ?></span>
                                                                <span class="direct-chat-timestamp pull-right"><?php echo date('F d, Y', strtotime($conversation['message_time'])); ?></span>
                                                            </div>
                                                             /.direct-chat-info 
                                                            <img class="direct-chat-img avatar" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAk1BMVEX////wfiDwfRzvdgDveQ33uZHwexXvdQDyk0f+9/P1p3L1qXXwewTwfBrwexb72sP84c32tov0oGX//Pn4xKH3vZX2s4T97+T5yq3xgyn86dr+9+/85NT4x6X97uP60rnxhzHyjj/zm1vzlE750LPxgyjzlEz0pGj73cf61r/2rn3yjkHxiC3zmFf3vpv0nmDvbQCHekUEAAAPmklEQVR4nO1dCZeqOrNtk0icoFVwABywbYfWo77//+seDiQBkhCQIfdb7rv6rnW6FbKTSlWlUql8fX3wwQcffPDBBx+UA3/lDddzZzKdTk/hz8SZr4feym+6WWXA9tbOoRO0LAQhRHcYj//f/2W1gv2hvfbsphtZFN3Fsh9gHDIxAWjxAIAZMsf4X3+5+K/R9I+TC8DI4DNLMTUQBpfR8T8jtav5zQ1HTo0dYRmOpntbrppufDa8yQbBnOwoS4iCidc0BRlmzhkjsxA7whLh81XTkbTXY/QmvSdMBMdr/TSPPwmgkTE8LOQfNWAw0UvveD0oHj5gGg/7Z7Z2bvD4b3cfp/A3hnjChh/o6TMjh2MsGL6QGx4E28No+bcIfZjuU/bsbujjLP6Wo8MlGIQ8BX1j4PGwYWZPDH/44nkfpk1/OZzJxM2fDZf9DRRIgAF/mufojaHFEcyQXaetbMK7x+s+ZMkRWQvempVVv8+RTxOhzenYzfmo7nG04eliA/eb0zn21UCc0du2CzrTtnfdckYSGdeGbMd3AJOtsTBovydVXtvFSbEHMPguqc154B9wQqQAQuNjCU8+hp5DoutMfKhdVNdJATVhMJqV9PBZ24WJ7kPGb0kPV0N3nBBQgIN5Xt0ifcE8wIk3wHGZL8jA0UWJt7ulO5L22k30InLLmANKOMW7N1QE1UjQb0KVAXyq5D1JzLYw3rUtpyplbjsJYYHbsqa6BMdWzMab+FSlluuO4rbD2FUuqdeY4AC4r9qp8raJNzrVvu+EYwIK5tW+7oE5iIkq7lX4Lv8HxrpzXMOsCDGL2yb4U9m88AO2M61BHQP4xHzAzkYUVERxBdjXwH2dfpS/Z6XHApXM/iFgHCkAR1W8Q4IRK6kmqGBlPGSDDabxV/4bMvAdb0DpFBdsF6JdExHN1Y5RAwCWTHHIEoTjch+ujDGsjOKQ3WPB0zIfnQtTxhyDMgV1xSgZgCt2KqRwGKffLE+j+ixBuC7rsYWwhizFkgyWH1A7CFBtazQBjkyEwwrKWRT/IGYEmyYYp4h+ynhiDzIEmw9Bh2qPoQhLcMOvVH01L6JPsKOIr28/jR1BPQjeG8WM4puNmu2Y7mpWi7JYM4LVem8Jd6Ehi0btYBIOpWhc3nnQicoobM6T4WHKtOyNCNyR9hRqyhcVYUxtGC48Fbt0ElqudqkDO+KHgF1Rw0+7CRj1RGTyYEZXA0UF7JcR9cSC1/bmk3Y1cP5UO/OPaV+hoLvP9FE8ZGE7nVeiYRWAhuoe3YjKmFnEB++R71ub2B+Ou+TWV7kABrypNXhPpiIq4L19Ez0KBrH3TXCxrLU8MMBCpY3+gDQF594ltgMyTjAWF21jfqPKhTlQWt3OyVQ0g7zK/kq+G1dUf7UQVG4xVfcwpwtO1QwArG6zszLSSgNS8qFmpD3AyKds+rRvluzvJ6n0kqoAkFLEksop6uch6BFZtLbs7+2griEMW9xWauqW6FOcJzB1M/hfG0J+a6qA2VFqKh0M46ZOkBJJzAanNiENAdUm1pROKPUYy0808qAVf8spI0m2VGAlm/jlk/WBpRyXokOY3FLu18lQNT7h0OaqDuI44gGSRqlehopuClV/huIaY0H6BCdddi0Zfv0SZQPVBLtHhvBf8k96Mvz6RwZRyQH36RCmgmuaMmQGUUX/EreF4xpqyvCLLBPQJPvDdFEB07kWujIkvpuKw76OPgzcdHxHV4ZdN5qJCpt/xFQgTraFrgxpQCPbYMyID4Q4ESFtGcqbHQPxPC1eZ2jLkBG9rM2Hc6RnuIEPfRmSsJJ5ln+QrEUA4P1ZX4ZfRNdg+cqZGEP++lNjhm3ScrlJ3BBjyF0wa8zQIyZxI/vYahB9rMO1nBoz/NpGgzOQiSnxDQRBEp0ZEjHl+GIUt2hxj/hRHZ0ZesTOSeI1fqSQwIbv3unM0N5EjXfFCwySeCEKx+rMkIakJOEPYiuS+4X/CYZkP1FiL8g0hIJtY60ZdiOG4olINiWEwVitGX51XvYCANEicRG5bMKAut4Mib0QRlqXmVNVb4ZUUS4FnyDtF8Zz9GZIYmiGaBsqiqyKPTu9GRKvGgT8v9vRNBR2ge4MSfMwX9WQtaF4maw5QxKgEGwlEospzhPTnCHJwxN4LNeoBwbCYI7mDGfR4k8ghYeXRwPEh9+KMjSNAsifIuNHulKwfxEtIc0t98+FGRrQ3I97+XFQ20jiUuBn1WZ0QEGGCPe//bpSNw+v9vHNhd96MeQFu1/IzdCElR71TiIKfSd3559YkfW9yOfJz9AI6j2gsSTLC16sxstaHH7lZoi2NZayuIMuEXkGkeQnSLaK8zE09nWnTpMNem7OwlrK/4lcDMEusqsz59Z5Fz8jBYGncsjbZIsiicAU797kYhhJu9+D8F7h8x2YpoVwJzP9ZGW+tCU3ougQPVQOwyh/ZwHKSqQyMytGUHvA++REqmnzM3x5v56o4FwRYLGaTzDkBaOILZEcrcjB8OUZ2WdOObc3KMr9HNuV2fRpuQxfVnVebjajcZAyJHts3IAvYRiIHzBVn1Ivm7MtOa0/YxNbjaErfsBSeURes9kuOyE14+xI8C7DxUD87gTDzcOd8cpOfM/Y/1RkKJ6H9kZV6Mzz4ymlJxVLlgV3SKVURZcyuZxaMpTrUhV7+PXVUkxlb4YhOU/IFWYVnyZssuLEaobhTOrTEMtlSLP6l2rHnpphKPdLVdYWd/wqnVxrhqF8baGyPnxg0eEV1tWCoXx9qLLGf2F9G+D7EUuWqJE4Jxk0wVC+xleJ0xB0j3PHWfaomwpPThzPiVAzQ7I/yI3TqMTaEqAnhUXH/vkMTStZqjz1G2BaJk+lyRsnj7XReGmG/05B1K/QhvIYmnB/uMUKdxqD7eEWK3OJWj+9S7oOcxZDebz065Id8xYxFOYecxga57sm687pQWo4vs8av82WSbjb5Fkv/W05w4yYt8K+hYCh+JxxmiHJmDuSbZRIZojQkzyCaerrUoZ034JfSMLJ3nviMxTnPnAY0qTHV2IBQCSo+hIyMyDfPydtr5Rh1t4TUbXKJV9eDCUHqlIMzT352ysRkunv7+enGWV+TU5FKUO6f8jftlLYA+YylFU9STE0mA8/03cYB2uFkj2c+r6UYdYesMI+Po+hKcjyEzBkZoiZZPhyOhiZ+M7FkNhnKPhAdi5GAg+G0pPzKYaAPtt7SSk1Tq95gujB89TJainDaH2endOleD71wVBeeoijaYgIRkEFqtguT20OdtEvuqmT1TKGJJ8GiWryZOdEpRlacuPJsRbBi9CaeFjRI8jBF3LwvJ+y+TKGRKSFWcLZeW0phlmFazgW32r9hhPXZ0ydsbn3KGvf0eUu+t427dTIGLYzFE0oE5m5iSmGWYVheF4bgEZnA9nGm3i3j181ZOF/+3/JyxeyGJKUqJ1Q92XmlyYZ4iwXVrC2SDnVQOE3WQxJfqnkdFdmjnCKYVZP1Ll6UskRJumLihbRyeyIOhlSUyAOUmTm6ieQXZujRobk8CuQ1fzMOm+RGzUyJDEa6YHurDMzOjMcSeNsEVbkHDf/3JPGDOmWinwDLjp3Iji7pjFDIqTM+oyHjPOHGjOkJ2bkocKV/AypvgxtEvbBGREK+Tng3FjUtUNK9iQEQSgKskxWrYQih182Q9Gy4SKpBBFHjoPtSii7dJZAA5IzsiC7inkUVM0R+pbhWu5EFMVyT0T0sv1NaV2M/PB3pQ6iwJqTnVGVQkrS2iYFsC5zEKFgtUYrzqiEmGT1aYrA4S1kCwFAQTEvWg44wxg+IasxVAh/QdFrrGP0TGSI1n1ksoOB0qBI6kQVQ/f3thsUAd28GwxAZyJU7sTaq5WTZGp9FSvPy4PdLQA7KiUKh3bXFo8O1deqYVBxvba68XI25ZkFPqnwKYyTJiGuuVc3us8lkZwhLZisvm4X1k2sHc8ZI2W4IrNQeb8lVvuynlsjxXhsDEsZ0prV0pIfCYjqlzaAexa1jCGtWZ2rCC1NC81YMVcPDwEZQ7Zmda4ZJaoj3ACWUMZwQrWiQrk9BqJa0E1gbIgZLsiVM2bem5Foqmye8ryVwBcztGnd+dw3bTH5zuWsMd7A+v9EDKmMZuxj8iCsq98AROdlmTz5IjpfeDdC/fD5hs52qZwVuQVHfL+FLqBjUHApy6zOFfcT6wVz4KjobWl63zOzYAgWvamJuSvI1O6uILpmyiwGKYHG9z3ZW+Y2sTfufdX3zi6qZd68Lo25dy3vJSCVgsnGKXKJDoMZNTk63Z3HXCxnbd4MXDP3HxYop1IRGDuheJWJDEx36XKHJXufbKr0fwEw2kaPe0j/mJNXOReFfNia3SXL3seU7/YcIeL3ATc9F3/pPV0t9Nb1lQx0utPZYeag8a4apdDnXu4RI6KW8rkQBWhyt7rdZ2yXGbxtJ1gM2WNKsCEf1b8wabdmWal3ERYsRbQrtfsU4QGDJVh6E4ZsjRLTqH9JPB8wDbCCCmLxQ0bdhCq15sCGfYod5yt3DkZYAfZULNzXGYHzgtjpxE1F7/Zjr7EG9cVRr7Hz4+hSWQkx/4dNHQFwXE/0ZhV7bQv2qoyonGJ5agjUMYyOEav7g8twtiWIywuA+6r3F4dnVsW0zEFp2RMiHN1Yj5q40sKI/imeb4SC/AUxc2N2iedxoZZT1bywr634ySc4rkeBn+LFPwB0q5Gc+S4moKG8lHSCIBtHN961ALvrssfRnoM4v3okNEL3kHg7wMG8TCPlO0HiDSY81Rt2XydmSNiCYFSWeZyN3AS/cABrDy74vWRWJUBI9d53Kf4uCCX4mXjaxL7Jd1KQ7gcjQfstA2kvRkaq+g2A5xpnYKw513RtDoDgtu0V63Dba59hcvjuq9F5cxtffh+nKymaCG2mx7x6p/t32gxQOp3YwNOaS/Um4I15JZXCkYSd9lHVPPvHdgdCg5NIbMBe83uzwx/IrYhphiw3/eVwJuPpz45OfwMhZ/Du8gnHDU3ABIZjjqw+WRoIDoJtb7T8W3grv/uYT7bdnc28xd9y1NsGA4xEJVwR7uvB7w6vx9EQRGTvPB/DtHNdNwh/do8BhiE38ZcQPDUR7hLDnwR8YWUazUL+UQMGk6bTlNKw1wfEn045YULU+9YtMeKFmXPGYmlVo4dwZ9m8+pTAm2wGRQ+QAAsOzhO9Zh8Xq/nNhSgnS2Ah6N6W/wF6T/jHyQ2EdkCNJTAgBrfJQj/dIoe9WPYDjB82gc8UADMcOQyD/nKhqWbJhu2tr6Fdb1kP+3fHs4Lk/V9WK7gcnO+Cbrpm8FfecL10JtPp9BT+TJz5ehj6OE0364MPPvjggw8++J/B/wONrgkWof6C+QAAAABJRU5ErkJggg==" alt="message user image">
                                                             /.direct-chat-img 
                                                            <div class="direct-chat-text">
                                                                <p><?php echo $conversation['message']; ?></p>
                                                                <p class="direct-chat-timestamp"><time datetime="<?php echo date('Y', strtotime($conversation['message_time'])); ?>"><?php echo date('H:i', strtotime($conversation['message_time'])); ?></time></p>
                                                            </div>

                                                             /.direct-chat-text 
                                                        </div> -->
                                                    <?php }?>
                                                    <?php } ?>
        
       
    </div>

</div>