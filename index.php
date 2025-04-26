<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="index.js"></script>
</head>
<body>
   
        <div id="main">
            <nav>
                <div id="logo">FitPro</div>
                <div id="cont"><a href="#main"><h2>Home</h2></a>
                            <a href="#about"><h2>about</h2></a>
                            <a href="#product"><h2>services</h2></a>
                        <a href="#contact"><h2>contact</h2></a>
                </div>
                <div id="login">
                    <a href="memberlogin.php"><h1>Login</h1></a>
                </div>
            </nav>
            <div id="text">
            <div id="tx1"><i> NO PAIN NO GAIN</i></div>
            <div id="tx2">
                <h3>
                Having a perfect body requires a lot of training. Nice-looking body and
                powerful organism are interconnected – and we can help you with both.
                </h3>
            </div>
            <div id="btn"><button id="b"><a href="plan.html">Join us now</a></button></div>
            </div>
        </div>  
        <div id="about">
            <div id="bigb">
                    <div id="box">
                        <div id="img1"><img src="img/im-removebg-preview.png"></div>
                    </div> 
                    <div id="box2">
                        <div id="ab"><h1>ABOUT US</h1></div>
                          <h2>THE BEST GYM</h2>
                        <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolores incidunt suscipit. Delectus dolor eius esse explicabo
                            magni omnis porro quo sunt vero voluptas. Deleniti esse, exercitationem fugit, minus mollitia nam nostrum obcaecati provident quam 
                            quos, sapiente similique suscipit unde voluptate
                        </P>    
                        <br>
                        <br>
                        <p>Consectetur dolor sit amet adipisicing elit. Aspernatur aut dolor doloribus eligendi eveniet ex exercitationem fugiat illum,
                            iusto magni molestiae nihil quas, quo reiciendis sed s/equi tempora tempore vero vitae voluptas? Ad nulla, voluptate!
                        </p>
                    </div>
            </div>
        </div>         
        <div id="product">
                <h1> OUR SERVICE</h1>
                <div id="box1">
                    <div id="b1"><img src="img/s1.jpg">
                       <h2>SWIMIMING</h2>
                       <p>ww have bext coche for swimimig we teach best swimiming and workout
                         we paid service and kind the swimimig and nothing to much why is so had to
                       </p>  
                    </div>
                    <div id="b1"><img src="img/gymm.jpg">
                        <h2>GYM</h2>
                        <p>ww have bext coche for swimimig we teach best swimiming and workout
                            we paid service and kind the swimimig and nothing to much why is so had to
                          </p>  
                    </div>
                    <div id="b1"><img src="img/cardio.jpg">
                       <h2>CARDIO</h2>
                       <p>ww have bext coche for swimimig we teach best swimiming and workout
                        we paid service and kind the swimimig and nothing to much why is so had to
                      </p>  
                    </div>
                    <div id="b1"><img src="img/yoga.png.jpg">
                        <h2>YOGA</h2>
                        <p>ww have bext coche for swimimig we teach best swimiming and workout
                            we paid service and kind the swimimig and nothing to much why is so had to
                          </p>  
                    </div>
                </div>
        </div>
        <div id="shedule">
            <div class="schedule-container">
                <h1>Gym Class Schedule</h1>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturaday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Moring<br>6:00AM TO 9:00AM</td>
                            <td class="class" data-title="Yoga" data-info="Instructor: Snehal madam,Duration: 1 hour">Yoga</td>
                            <td class="class" data-title="swimimig" data-info="Instructor: Pramod sir,  Duration: 45 mins">Swiming</td>
                            <td class="class" data-title="cardio" data-info="Instructor: shubham sir,  Duration: 1 hour">Cardio</td>
                            <td class="class" data-title="Boxing" data-info="Instructor: vishal sir,  Duration: 1 hour">Boxing</td>
                            <td class="class" data-title="gym" data-info="Instructor: Rushi sir,  Duration: 1 hour">Gym</td>
                            <td class="class" data-title="Mix-marshal arts" data-info="Instructor: sahil sir,  Duration: 1 hour">Mix-marshal arts</td>
                        </tr>
                        <tr>
                            <td>Evening<br>5:00PM TO 9:00PM </td>
                            <td class="class" data-title="Yoga" data-info="Instructor: Snehal madam, Duration: 1 hour">Yoga</td>
                            <td class="class" data-title="Swiming" data-info="Instructor: Pramod sir, Duration: 1 hour">Swiming</td>
                            <td class="class" data-title="Cardio" data-info="Instructor:Shubham sir, Duration: 45 mins">Cardio</td>
                            <td class="class" data-title="Boxing" data-info="Instructor: Vishal sir, Duration: 1 hour">Boxing</td>
                            <td class="class" data-title="Gym" data-info="Instructor: Rushi sir, Duration: 1 hour">Gym</td>
                            <td class="class" data-title="Mix-marshal arts" data-info="Instructor: Sahil sir, Duration: 1 hour">Mix-marshal arts</td>
                        </tr>
                    </tbody>
                </table>
                <div class="class-info" id="class-info">
                    <h2 id="class-title"></h2>
                    <p id="class-details"></p>
                    <button id="close-info">Close</button>
                </div>
            </div>
        </div>
                    

        </div>
            <div id="testimonials">
                <h1>Members FeedBack</h1>
                <div id="texti">
                    <div class="testimonial-container">
                        <div class="testimonial">
                            <p>
                                "The trainers are highly professional, and the facilities are amazing! I've never felt more motivated to work out."
                            </p>
                            <h3>- Darshan wagh</h3>
                        </div>
                        <div class="testimonial">
                            <p>
                                "FitPro is the best gym I've ever been to! The atmosphere is great, and I've seen amazing results in just a few months."
                            </p>
                            <h3>- Vishal Mahale</h3>
                        </div>
                        <div class="testimonial">
                            <p>
                                "I love the variety of services offered here, from yoga to cardio sessions. It's a complete fitness solution!"
                            </p>
                            <h3>- Sahil chaudhari</h3>
                        </div>
                    </div>
               </div> 
            </div>

        </div>
        
            <section class="nutrition-plans">
                                 <!--<h2>Our Nutrition Plans</h2> -->
<!--<p>Personalized meal plans tailored to your fitness goals.</p>-->
                <div class="plans-container">
                  <div class="plan-card" data-plan="weight-loss">
                    <h3>Weight Loss</h3>
                    <p>Low-calorie meals designed to help you shed pounds.</p>
                    <button class="view-more">View Plan</button>
                  </div>
                  <div class="plan-card" data-plan="muscle-gain">
                    <h3>Muscle Gain</h3>
                    <p>High-protein meals to support muscle growth and recovery.</p>
                    <button class="view-more">View Plan</button>
                  </div>
                  <div class="plan-card" data-plan="balanced">
                    <h3>Balanced Nutrition</h3>
                    <p>Wholesome meals for maintaining a healthy lifestyle.</p>
                    <button class="view-more">View Plan</button>
                  </div>
                </div>
              
                <div class="modal" id="plan-modal"> 
                  <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h3 class="modal-title"></h3>
                    <p class="modal-description"></p>
                    <ul class="modal-list"></ul>
                  </div>
                </div>
              </section>
        <div id="cal">
          <div id="bmi-calculator">
            <div id="bmi-inputs">
                <label for="weight"><h3>Weight (kg)</h3></label>
                <input type="number" id="weight" name="weight" placeholder="Enter your weight" required>
                <br>
                <label for="height"><h3>Height (m)</h3></label>
                <input type="number" step="0.01" id="height" name="height" placeholder="Enter your height" required>
                <br>
                <button type="button" id="calculate-bmi">Calculate BMI</button>
            </div>
            <br>
            <div id="bmi-result">
                <h3>Your BMI: <span id="bmi-value">-</span></h3>
            </div>
          </div>  

        </div> 
        <div id="contact">
            <h1>Contact Us</h1>
            <div class="contact-container">
                <div class="contact-form">
                    <form action="contact.php" method="post">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
    
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
    
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
    
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
    
                        <button type="submit" name="btn">Send Message</button>
                    </form>
                </div>
                <div class="contact-details">
                    <h2>Get in Touch</h2>
                    <p><i class="fas fa-map-marker-alt"></i>Fit pro gym, Malegaon,Maharshatra</p>
                    <p><i class="fas fa-phone"></i> +91 9172511646</p>
                    <p><i class="fas fa-envelope"></i> contact@fitpro.com</p>
                </div>
            </div>
        </div>
        
</body>
</html>