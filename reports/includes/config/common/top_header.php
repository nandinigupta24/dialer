<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar-->
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('dashboard')?>" class="logo">
        <!-- mini logo -->
        <b class="logo-mini">
            <span class="light-logo"><img src="<?php echo publicAssest();?>assets/images/logonew.png" alt="logo" style="margin-top:8px;"></span>
            <span class="dark-logo"><img src="<?php echo publicAssest();?>assets/images/logonew.png" alt="logo"></span>
        </b>
        <!-- logo-->
        <span class="logo-lg">
            <img src="<?php echo publicAssest();?>assets/images/logo-light-text.png" alt="logo" class="light-logo">
            <img src="<?php echo publicAssest();?>assets/images/logo-dark-text.png" alt="logo" class="dark-logo">
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown-toggle1" title="Agent"><a href="/agcbsb/agent_development.php" target="_blank"><i
                            class="fa fa-phone text-green3"></i></a> </li>
                <li class="dropdown-toggle1" title="Reports"><a href="<?php echo base_url('reports')?>" target="_blank"><i
                            class="fa fa-bar-chart text-blue3"></i></a> </li>
                <li class="dropdown-toggle1" title="Realtime Reports"><a href="javascript:void(0)" target="_blank"><i
                            class="fa fa-pie-chart text-red2"></i></a> </li>
                <li class="dropdown-toggle1" title="Support Dashboard"><a
                        href="https://usethegeeks.zendesk.com/hc/en-gb" target="_blank"><i
                            class="fa fa-life-ring text-red2"></i></a> </li>
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p><?php echo ' ' . $PHP_AUTH_USER ?> &nbsp; <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAABKVBMVEX////A5eSIzdf927y+eEFHKyn6v4L7zVnxvBl3y9JRLCvxz7G94d9KMC61cj/7/v5OODZMLiplWFZeT0x6enj21bZZNy9TNC5TPDmLlJP++/NcR0SHZltjRD1URUTPrZXb8PC4lYGif27GpY1kPjCgZTvt+PeUoqHg8vKKWDlqRz3lw6jZt552cXCnv72Qb2KgeF5tZGJ3oqmChoR3VUp1STJmeX1VTk+tgV98sLiesbDQ6+v76LLGvbyEcnDz8vK00tG3rKsApaVSvcPEnX7W3LGjlZRfZ2nDxqv32X32z2X43YvQ4MKXXzmCvMXew5jrwY6xyLn98tPhqnf94p+Q1NpvkJbzx0DI4tKt4OSbk4ddYWOLeGr81XUpXl0qgYHm69T+8M7h2JZ5ZYtzAAAML0lEQVR4nO2d+V/aSB/HkXS8uMJhQA4lgCCnoFwCKt16VK22tdXdbnef6///I56ZCYEkJDAzmUD39crnB1dYa+bt95yZTPB4XLly5cqVK1euXLly5cqVK1euWJQcPd4/jtY9CttK3m8r+r7ukbBqdP8Cv778vq3qIbnO4YSgikX0lfIfvsChJz3JGQckcWSESxQqHmeHww2dhsPscbFI+AtGcOQvnvttrVYcKJDBQGDgyRZJzPOwfe9J6ji2f3d87FOFitmFEDMaIpiRHmT7xXEArFCRDEJlOV7K8mgAWYlv0VGQsdyvHCR0TE8xYVkU/au2SCjLirEExRgjzlYSFp8iRdFzbDmJEbKNsQjl+6qSlj2nIkB50HA8OsfBHOKmKGYZLPmwAg4+XqXRsdlVRkq7teWcX3E1hyJTo3heRqORc/mKuzkUkfaU3FR0BGPDyihOiV+yWi+JQ26lamXu5ZhbqTLNXv9ADkv3ChFNYn4hDnOS0I+dnZ0NbhwOVA9CEsTBj2RFHCYk2R1FfLxrZRzzJMMJCJectpL4sCDhaZGVckAS/dVfMcePfx7HxkZWf3lE8oODQUJMg/GPG2M/K4mhMmaHWdORUXJQ9yX+QSwKsMRIbMBE40S3QsvRqIuIIS5J8TD6JlAfMJDw7yApE2+jBRk6R8F3WMGjDoKJ0qNw74WpAt3fiAFQOHqn05EEUVoNWpIsXw6KQPcPkE9JBgyMEocosTHZr5nuSfANE+KJlL90ACk6JhhIZehg4hlB2KN0pWaXtXS8jSgId4LmFFgdaJTE/jKrKKUwpH3BRcSOtQ/AQgwU9wWUwg6i0ciZNc7EnYa6VxxE6lgxELfwKV2oFJTiAlKWPqYH4eZcpI51BqQl5lCtclSGAsAyG08quvoyywmEsBSWQJyMY6IyKFn+LmyDY/1L2yI0yFgEVBwLQTaOi9rdCj7xTmiQFihTcUAQ8urII94JDdIAcTqOd5JI3kfyMAmhQeq0BgmCOjEHD5MQGsQfAJQGKVsnLRPZNwmhQQagQAkST1DNUOyahLSGxOg964yGw7ZJSKdTEcrc++5oUfI1k71aQtxliZoQOXoiAqGziM2VbdJ5oR/MQJ7CYeOkykwgSgdib62U9CLjGcgTaPqai3t5LAlQLkfYCXfyeci0HAbDTUEQau2w1eRKFU1hx7IT7sQTwxlIoS1g5dtzs3ZVQWwt6mi3E+7E15iCPMV9wkS1dNhszhsshwv4v7TRbsO3yJdOpjEiNYWZqs0CiHfKGpjgUycs5XCqDoIYJQi7b5Hv3apZ6yjsE3SqNSthEC4UOp1yuVOQAKjIgpDBxZOq18JiBqFYXEwoIJ22MKe9w366XSlIUqHdlDFns8AGwupbNKvWk8oev54HmVctzgbCWhNpVhdjAEXCUZyEQxDCiJo62JmDhOb2hn3cNJYVz/Ll5RyUXJsFTE1Gb8n5Kn5VeULBvk8LwpqAadbflTa+kEO5qr2rSo2YE2n6FiZJlxEIbR1hDRKqjR0lbcVreJht+Kev1Q7lXG0Cks+c4Hfysoxf5zqoIFIvaDMGCd1OWxRGezBMFiKCXEAtCv3WD1uQ0O2InMEgOZIIQWoSdEPa7pcZhO5WJhQk5WkVyWcqh4bB56WMrH7vg/k3TFvYkZiinWqvrXEGQLA87U/kyq5UNfrT7q4aM3sATawYdhWZQCh+/ziCFqXLndx01Ie7uycGkD3NWwDtLxDtlOjFkrYoktY4gbc9C4Wp76A/f1ofFoe5WToW4kG0ewVatCQsaYsCpAUyqInyFfLqHx+VElkHUkVFZGqxeB+inQDq4p5lAKHIvoEExIAhIU0DXI7vpvf0ngUNUplWegn3ZDmQoARhSVsUIAnkReXmdWU2dp+hnUfOlZ/973bNd10TfEBcAQhFGYkg32/2m6RlBBb/Zrl8DUFSvxZILAXH1r8WMuQg/VozL9RAixKEZW5FAVIC0JH6fRqQqlCuCTJ9J88AMivsx0vO48EZO4zy6yYFyEnNV/YJJ1QL8nZBlNS9OPRTSl6lAunvCZkAdUVkB1FL0EKSM4ywZzJhtxBu8Kv0IWIDZPp6kXcNUJAIPgoQVHFyDFMrZpBZvlsY/Ni3TEByvtlX3ft5+CUTILzBxh7IMQ3IfgKBpI3jFarp9Ek6XZt7H4HkqVfoVgAyFnNo1CZO5KvN13gM4ksBeoPYqCPTGcDiC5TAXz5TEHPl5MMUfRGx1Wup/3RZfRwcJGTjDMRachsEGDhsNY1Dw30hVvLHgMYi8p7J6GdzxgyIMPiV3e53aHxUgIUimqxVPTGiHKZns/g8iLLdC5xlAKG/X7kU0MZ1Pn0iq+mqKufaOQ1YmmGVEYtpYYv6KmNgmBTK6YxUaVckqZ3TransiSwJC4lpqZH+RFgkMh8Yvlp1Llxkht5kpSADkJ8nMVGKvuudiGk5iOHQSytlkqzmlGM2CNtKI8Mpi7FYX85xCETGCGEEYTlmMQB/LuOoJpgdi3XLiuVS+8tIfEytyUSMm4hMB1nP9CQykqb7rabotw5nYtyxYjvith+o71mC5EVQZz7fw7yH+HJz84nhco2DlHEhXlWOfpFUqywLRfL7FtLD//6gvt64JWbMUOQMEJnjHIklRF4etiZ6YLBKK1PJGStKtZ0BKfptQ60YQiS5NdMDvU1a7c1mJq9LVjmp32RtFSdiCZG/NSBb99SXjKY3N7+l24cajObmZtNWgDB51mhLpxvaSyYgCERpZ/BcqoYxNjf7LKsNGjF41qMehNYkY4AHDlGasI+PZ9RX1Lcx6sTiWQ96kAe6KzaioL851bfZt3FbQcKSs7YMorjceD8KQGbTVH0AUgsOJC0RS1lntYi/1EJ7nO1v5iCbfbQF2mI77Zpl4PDcM8UIPoAI4k0rDIzSRkd3Ywz1hKlhZMha47MDdCD3558LKJSY+Qv9ILWLMfZZOt96WOoK4xK+Y6D39uz1vn5cyPHx1es9vQtAZjoXY+zg/6sFWdKj+AetADpa2D33TvTxiwXFl6+Tn3h+Q2ZJkJuF+Q7TEalj+ffRbQ/i3alXq6+fTTA+N7Q/cn6HIipSIjML+z2/L5OAv//PwgsMEigw3rxzGhvM8vnr69zPvP1Ef4MWAYut0yPJ0ffvo+TCqbu/Dl0KBYapXr9+/Ixovnz++NXiR5672MWW1kkup1ytJ4r+CAh0LYZIrPO33tK7azidO7aau0OOg/PlI12u04MlK12cjh1bLXDFQI8HBtRzb2EXxu0guLlJGtw4IIm46HQlt6P55vFeB1z8SlF3wVY1x+eGmcW7X/zJj8N7DiKOOxaSiXOVgEn1YJdoeTsH16dXmDhXPWBVP5h0Z3VjNucH0s1nrii/UFdAzJe8uDoWkvF2Zn/gjitI1wKE+zN3jM9AagDbNd0AYpq2HHgKkiFMBnxj3ftmWhIdeWKjPkxK4HT56KhATFbvsk5wGEj2eZZDU5BPN5+ceqypti6eAa7Z13tqWIb8A82HHp16zK8mdcUAVw4Iot/JUuZ1jn3oyIykzhnkXN/Jf5rMsx178vI0CdcDvEF0zdbNBMS5J2GrNqmLfEGe9SvcjltkStLiDqK9T34YUjYEHP0wBSV3tQ74gni1RzCGIWUP0+EPhSg6AhIQtRxQyRfHP10IkUR4g4jTc4krepI0Euwgo7xBDlSQ1T46PusAyHjmVitUVNdrfdhhGPoH3aseniJmV83haQFR08f/9sFLrZ3f5kFW/okEHs9VBIDe1CgcQH6CwerNgfVeBNNZIgeQO3CxFgyoq0u0Fs8J5O0AvF8XiMdzEYX+dWof5LkLrZu6Wh8I9K8URrEFcor2e1JrtAfW1S38Y/b+zQyi7MC11hYfGmEUsUs984Ug53jDSrxdq1NphRwM/LTcgzPX6b/wzvzlr2CMmS4ukYf0uoRLK+fdHtrSDrTer8sY2dcdr8Vy7MUlGpvYu3tbSPN82u3h55eLl2ujUD+pwerI1tXFLb4DAgQOenfdt9NzqGfob8/Pz+jb07funcIAQOR2vR7lXfqJExDmMhoACyS2bi/WHd3FySdOLF3rv7p4f3t7GYmmUqIIqUQo+DXaulw/A1ZoApJd90BsS/l4Ge96ulSewh+d4c2uexgcFBr+cOCDG1y5cuXKlStXrly5cuXKlStXrlytSv8He6SaAZklvhcAAAAASUVORK5CYII="
                                class="user-image rounded-circle" alt="User Image">
                        </p>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="#"><i class="ion ion-person"></i> Lock Screen</a>
                                </div>
                                <div class="col-12 text-left">
                                    <a href="<?php echo base_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>