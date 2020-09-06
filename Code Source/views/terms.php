<?php
include('../app/models/connect.php');
include('../app/models/db.php');
include('../app/controllers/category.php');
include('../app/controllers/product.php');
include('../app/controllers/cart.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/Store.css">
  <link rel="stylesheet" href="../assets/css/terms.css">
  <title>Terms & Conditions</title>
</head>
<body>
  <!--.nav-collapse -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="../assets/img/your-logo__7_-removebg-preview.png" width="200px" height="46px" alt="">
        </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Home</a></li>
          <li><a class="active"  href="#">Store</a></li>

          <?php foreach ($navbar_categories as $category) : ?>
            <li><a href="category_page.php?categoryId=<?php echo $category['idC'] ?>&page=1">
            <?php echo $category['nameCategory'] ?></a>
          </li>

          <?php endforeach; ?>
          <?php if(isset($_SESSION['idU'])): ?>
            <li><a href="myaccount.php">My Account</a></li>
          <?php else: ?>
            <li><a href="login-reg.php">Account</a></li>
          <?php endif; ?>          
          <li><a href="ContactUs.php">Contact Us</a></li>
          <?php if(isset($_SESSION['idU'])) :?>
          <li><a href="cart2.php">
              <div class="cart-nav nav-item-link">
                <span class="fa-shopping-cart"></span>
                <span class="nav-cart-items"><?php echo $countCart ?></span>
              </div>
            </a></li>
          <?php else: ?>
          <li><a href="cart2.php">
              <div class="cart-nav nav-item-link">
                <span class="fa-shopping-cart"></span>
                <span class="nav-cart-items">0</span>
              </div>
            </a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/.nav-collapse -->
  <div class="container part2">
  <h1>Terms and conditions <br></h1>
  <h3><span style="font-weight: 400;">Of processing personal data of end users, serves also as</span><br>
<span style="font-weight: 400;">“End User Agreement”</span></br></br></h3>

			<p><span style="font-weight: 400;">Please read this document carefully and give your consent at the bottom.</span></p>
<p><span style="font-weight: 400;">This document contains the terms and conditions of processing personal data (herein after referred to as the “Terms and Conditions”).</span></p>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">In order to gain access to our site, we ask you to provide your personal information (“Personal Data”). All information that you disclose is confidential and protected from unauthorized disclosure, tampering, or damage.</span></p>
<p><span style="font-weight: 400;">Your participation is voluntary. According to the Terms and Conditions you give your consent to use your personal data in accordance with the following conditions:</span></p>	
<br>
  
  


			<h2><span style="font-weight: 400;">Subject and purpose of data collection/data processing</span></h2>

<p><span style="font-weight: 400;">We limited liability partnership (LLP), including its subsidiaries, affiliates, divisions, contractors, and all data sources and suppliers – a global online platform where opinions are created, acknowledged and transformed into universally accessible visualised data with the intention to induce a civilization that is inspired by the freely created opinions of the majority, which are supported by unbiased information. </span></p>
<p><span style="font-weight: 400;">We provides access to a system where users can:</span></p>
<p><span style="font-weight: 400;">– create polar questions (Yes/No questions) about current articles (the “</span><span style="font-weight: 400;">survey questions</span><span style="font-weight: 400;">”). This is done via the backend;</span></p>
<p><span style="font-weight: 400;">– answer </span><span style="font-weight: 400;">the survey questions.</span></p>
<p><span style="font-weight: 400;">It is important to note that all analysis of the survey results such as reports, statistical tables, charts, graphics or other visual forms (“statistical reports”), are always aggregated into statistical information without compromising individual votes.</span></p>
<p><span style="font-weight: 400;">We controls personal data. It collects and processes personal data only for the purposes of Oview activities. Oview respects your privacy and complies with Dutch&nbsp;and international data protection law.</span></p>
<br>




			<h2><span style="font-weight: 400;">Personal data</span></h2>
<p><span style="font-weight: 400;">During the registration we ask you to provide personal data which includes your name, birth date, gender, education level, location (city), language preference and/or other categories of personal data which We will decide to include in the future. Providing this personal data is optional, and it determines the amount of information in statistical reports the user will be able to see after responding to the survey questions; meaning; providing your personal data gives access to the corresponding aggregated data in the statistics reports. It is possible at any point to remove and/or add personal data, and that will immediately change the extent of access to the relevant statistical reports.</span></p>
<p><span style="font-weight: 400;">We can collect, process, store and use your technical information</span> <span style="font-weight: 400;">such as cookies, and/or other technologies, and subsidiary analytical software as described in our Cookies Policy and in accordance to Dutch and international law. The statistical information of your activities in your Oview account can be used for improvement of our system including security policies, but not limited to it alone.</span></p>
<p><span style="font-weight: 400;">We collect information from your mobile device about the system and model of your device, version of your operating system, and statistical information about the equipment of your device such as the processor, </span><span style="font-weight: 400;">short-term memory, </span><span style="font-weight: 400;">internal memory, application versions and similar. This information could be used as statistical data for improvement of our system including security policies, but not limited to it alone.</span></p>
<p><span style="font-weight: 400;">You can use third party services (such as Facebook and others) to share personal data while creating an account in Oview. Only personal data with public access will be collected in the case of using third party services. Oview does not have direct or indirect intention to collect more personal data than we ask of you during the registration</span><span style="font-weight: 400;">.</span><span style="font-weight: 400;"> You can manage the information that we collect through third party services by changing the extent of public access to your personal data in those services according to their Privacy Policies.</span></p>

  <br>
    

			<h2><span style="font-weight: 400;">Processing of Personal Data</span></h2>
<p><span style="font-weight: 400;">Without infringement of personal protection and in accordance to Dutch, European, and international Data Protection Law. Oview </span><span style="font-weight: 400;">has the right to use all data collected for actions or a set of actions, including the collection, recording, organization, storage, updating or modification, retrieval, consultation, use, dissemination by means of transmission, distribution or display in any other form, merging, linking, as well as blocking, erasure or destruction of data (“processing”).</span></p>
<p><span style="font-weight: 400;">Your personal data is processed according to the Terms and Conditions and Privacy Policy of Mari-Shop.</span></p>
<p><span style="font-weight: 400;">We will store personal data on a special database in the server of third parties (the “provider”). This provider stores personal data in accordance with the Terms and Conditions of the special agreement between us and this provider. All provider activity related to personal data is regulated by the Terms and Conditions, our Privacy Policy&nbsp;and the provider’s Privacy Policy. The provider guarantees additional security measures to your personal data with relation to the server where all data are saved.</span></p>
<p><span style="font-weight: 400;">Your personal data is protected from unauthorized access also from the third parties through our encryption during transmission, storage, and other processing of personal data to increase the level of safety of your personal data.</span></p>
<p><span style="font-weight: 400;">With respect to your privacy and following the requirements of data protection, your personal data are used by Oview only after its depersonalization, mixing and modification. The modification of information is the final step of creating statistical reports. </span></p>
<p><span style="font-weight: 400;">All results of public opinion become public only after the user</span><b>`</b><span style="font-weight: 400;">s voluntarily participation in survey questions, with the option of user</span><b>`</b><span style="font-weight: 400;">s preliminary research into the topic discussed in the different articles.</span></p>
<br>


			<h2><span style="font-weight: 400;">Users</span><b>’</b><span style="font-weight: 400;"> &nbsp;rights &nbsp;</span></h2>
<p><span style="font-weight: 400;">You have the right to know what kind of information related to you is being processed by us, and/or whether your personal data is being processed or not. You have the right to send a request to Oview in order to correct, supplement, delete or block information related to you according to your specification based on legitimate grounds and according to the Dutch&nbsp;and international data protection law.</span> <span style="font-weight: 400;">Maria-Shop is obliged to inform you when we finish all actions related to such a withdrawal, </span><span style="font-weight: 400;">in accordance with</span><span style="font-weight: 400;"> the term fixed by the law.</span></p>
<p><span style="font-weight: 400;">Users have the right to react to this document and notify Maria-Shop, via email, what they would like to change in the Terms and Conditions and why. Oview reserves the right to change the Terms and Conditions in accordance with these suggestions, but it is not obliged to do so.</span></p>
<br>


			<h2><span style="font-weight: 400;">Providing personal data to third parties</span></h2>
<p><span style="font-weight: 400;">We keep your personal data in accordance with confidentiality requirements by law and without infringement of your privacy. </span></p>
<p><span style="font-weight: 400;">We encrypt your personal data during transmission, storage, and backup to increase the level of safety of your personal data.</span></p>
<p><span style="font-weight: 400;">Specific employees of Maria-Shop</span> <span style="font-weight: 400;">have a key to the codified personal data for the purposes of improvement of the application system including, but not limited to security policy, for ensuring proper operation of the platform, and for other legitimate purposes related to Our activities.</span></p>
<p><span style="font-weight: 400;">Third parties can view the statistical reports without any personal identification of the users.</span></p>
<br>



			<h2><span style="font-weight: 400;">Limitations of the validity of the </span><span style="font-weight: 400;">the Terms and Conditions</span></h2>
<p><span style="font-weight: 400;">You agree, for an unlimited time, to give your consent regarding your personal data to us according to the terms and conditions as described in the Terms and Conditions.</span></p>
<p><span style="font-weight: 400;">Maria-Shop has the right to change the Terms and Conditions without any notification unless these changes reduce users</span><b>’</b><span style="font-weight: 400;"> rights; it will not be done without the notice and additional consent of the users.</span></p>
<br>




			<h2><span style="font-weight: 400;">General</span></h2>
<p><span style="font-weight: 400;">All the definitions in the Terms and Conditions can be used in the plural form as well as in the singular form without it having any effect on the definitions themselves. The pronouns used herein shall include, where appropriate, either gender and/or both singular and plural.</span></p>
<p><span style="font-weight: 400;">All terms and their definitions in the Terms and Conditions can be used in the Privacy Policy document, and vice versa, without any changes to their meaning/s. </span></p>
<p><span style="font-weight: 400;">In the event that any clause in this Terms and Conditions should be and/or become null and void, this mere fact will not have any effect on the validity of the other clauses.</span></p>
<p><span style="font-weight: 400;">This Terms and Conditions shall be governed and interpreted through and under the Dutch Law and the law of the court in Utrecht.</span></p>
<p><span style="font-weight: 400;">If you have any questions, suggestions or comments regarding Maria-Shop</span><b>’</b><span style="font-weight: 400;">s processing of personal data, please </span><a href="ContactUs.php"><span style="font-weight: 400;">contact us </span></a><span style="font-weight: 400;">. </span></p>
<br>
</div>

<?php include ('footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
