<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- bootstarp icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- css -->
  <link rel="stylesheet" href="css/course.css">
  <link rel="stylesheet" href="css/navbar.css">


  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>

  <?php include "navbar.php"?>

  <div class="container-fluid top-container p-5">
    <div class="container pt-5 pb-3">
      <div class="row">
      <div class="col left">
        <h1 id="courseName" >Full-Stack Development Bootcamp</h1>
        <h2 class="my-4">มาเป็น Software Engineer ได้งานหรือได้เงินคืน</h2>
        <ul>
          <li>หลักสูตร 100% ออนไลน์ ลงมือทำโปรเจคจริงๆ</li>
          <li>Mentor และ Career Coach ตัวต่อตัว</li>
          <li>สำเร็จการศึกษาในระยะเวลา 3-6 เดือน</li>
        </ul>
        <div class="button-content d-flex gap-3 pt-3">
          <a href="" class="btn btn-dark rounded-5 py-3 px-5">สมัครเรียนเลยทันที</a>
          <a href="" class="btn btn-light rounded-5 py-3 px-5">Download หลักสูตร</a>
        </div>
      </div>
      <div class="col right">
        <div>
          <!-- <p id="menter-short">Nanthawat Nurod Full-Stack Development จาก PSU Surat</p> -->
          <img src="images/fullStack.png" alt="" class="h-100">
        </div>
      </div>
      </div>
      

    </div>
  </div>

  <!-- course-descirption -->
  <div class="container-fluid course-dsc my-5 py-3">
    <div class="container bg-white border border-success border-2 rounded-4">
      <h1 class="text-success mt-5 ms-5">สายงาน Full-Stack Developer</h1>
        <div class="row py-5">
          <div class="col d-flex flex-column justify-content-center text-center" id="sec1">
            <h2 class="fs-1 text-success">+฿9.1k </h2>
            <p>การขึ้นเงินเดือนโดยเฉลี่ยของนักศึกษา Full-Stack Development Bootcamp</p>
          </div>
          <div class="col border text-center py-3 border-2 border-top-0 border-bottom-0 d-flex flex-column justify-content-center" id="sec2">
            <p class="text-center">ใน Full-Stack Development Bootcamp นี้คุณจะได้</p>
            <ul>
              <li>เขียนโค้ดในภาษาที่ใช้กันอย่างแพร่หลายมากที่สุดในโลก</li>
              <li>ทำความเข้าใจทฤษฎีการพัฒนาซอฟต์แวร์ และเครื่องมือต่างๆ</li>
              <li>ทดสอบความรู้ของคุณโปรเจคที่เตรียมคุณให้พร้อมสำหรับงาน</li>
            </ul>
            <div class="icon-container d-flex ">
              <img src="icon/html.png" alt="">
              <img src="icon/css.png" alt="">
              <img src="icon/js.png" alt="">
              <img src="icon/react.png" alt="">
              <img src="icon/python.png" alt="">
            </div>
          </div>

          <div class="col d-flex flex-column justify-content-center align-items-center text-center" id="sec3">
            <h3>สร้างเว็บและแอปพลิเคชันแบบมืออาชีพไปกับเรา</h3>
            <a href="" class="btn btn-dark">สมัครวันนี้</a>
          </div>
        </div>
      </div>

      <div class="servise-content container my-5 ">
        <div class="row text-center">
          <div class="col">
            <img src="icon/thai.png" alt="" width="60px" height="60px">
            <h5>บทเรียนภาษาไทย</h5>
            <p>สอนเข้าใจง่าย กระชับ และมีบทเรียนให้ทดสอบ</p>
          </div>
          <div class="col">
            <img src="icon/ux.png" alt="" width="60px" height="60px">
            <h5>เรียนได้ทุกที่ ทุกเวลา</h5>
            <p>คอร์สเรียนมีความยืดหยุ่นเรียนที่ไหนก็ได้</p>
          </div>
          <div class="col">
            <img src="icon/project.png" alt="" width="60px" height="60px">
            <h5>Project-Based-Learning</h5>
            <p>โปรเจคมากมายให้ท้าทายฝีมือ</p>
          </div>
          <div class="col">
            <img src="icon/help.png" alt="" width="60px" height="60px">
            <h5>พร้อมช่วยเหลือสำหรับผู้เริ่มต้น</h5>
            <p>คอยซับพอร์ตและช่วยเหลือสำหรับผู้เริ่มต้นเรียน</p>
          </div>
        </div>
      </div>
    </div>
    

  <div class="container-fluid assure-container px-5 py-3" >
    <div class="row p-5">
      <div class="col left fs-5 p-5 rounded-4">
        <h1 class="highlight text-center mb-4">CodeDee</h1>
        <p>รับประกันเงินคืน 100% หากคุณไม่ได้งานด้านเทคโลโลีภายใน 6 เดือน หลังสำเร็จการลงทะเบียนเรียน</p>
        <p>ข้อกำหนดรับประกันเงินคืน : </p>
        <ul>
          <li>หลักสูตร 100% ออนไลน์ ลงมือทำโปรเจคจริงๆ</li>
          <li>Mentor และ Career Coach ตัวต่อตัว</li>
          <li>สำเร็จการศึกษาในระยะเวลา 3-6 เดือน</li>
        </ul>
      </div>
      <div class="col">
        <div id="card " class="card1 h-100 d-flex flex-column ">
          <div class="content my-auto w-100">
            <div class="card-body w-75 mx-auto ">
              <div class="code-container float-animation border border-white">
                <span class="line"><span class="code-comment">// Código de ejemplo</span></span>
                <span class="line"><span class="code-keyword">function</span> <span class="code-function">example</span>()</span>
                <span class="line">{</span>
                <span class="line indent"><span class="code-keyword">let</span> <span class="code-variable">message</span> = <span class="code-string">"Hello, World!"</span>;</span>
                <span class="line indent"><span class="code-built-in">console</span>.<span class="code-method">log</span>(<span class="code-variable">message</span>);</span>
                <span class="line">}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-box container">
      <div class="row">
        <div class="col-4 p-0">
          <img src="images/webdev.jpg" alt="" class="h-100 w-100">
        </div>
        <div class="col-8 px-5 d-flex flex-column justify-content-center align-items-start">
          <h3 class="fw-bold text-success">พูดคุยและสอบถามเพิ่มเติม</h3>
          <p>รู้ข้อมูลเพิ่มเติมเกี่ยวกับทางเลือกทางการชำระเงิน หลักสูตรของเรา และตอบคำถามที่คุณต้องการอยากทราบเพิ่มเติม</p>
          <a href="" class="btn btn-dark mt-3 px-4 rounded-4  " >สอบถาม</a>
        </div>
      </div>
    </div>
  </div>

  <section style="height:250px;"></section>

  <div class="items-container container my-5 pb-5">
    <h1 class="mb-5">คอร์สเรียนแนะนำ</h1>
    <div class="row gap-5">

      <div class="itemCard col">
        <div class="card__wrapper">
            <div class="card___wrapper-acounts">
                <div class="card__score">+3</div>
                <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ffd8c9" cy="64" cx="64"></circle><circle r="48" opacity=".3" fill="#fff" cy="64" cx="64"></circle><path fill="#393c54" d="m64 14a31 31 0 0 1 31 31v41.07a9.93 9.93 0 0 1 -9.93 9.93h-42.14a9.93 9.93 0 0 1 -9.93-9.93v-41.07a31 31 0 0 1 31-31z"></path><circle r="7" fill="#fbc0aa" cy="60" cx="89"></circle><path fill="#00adfe" d="m64 124a59.7 59.7 0 0 0 34.7-11.07l-3.33-10.29a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.33 10.29a59.7 59.7 0 0 0 34.7 11.07z"></path><path fill="#ff8475" d="m46.54 121.45a59.93 59.93 0 0 0 34.92 0l-2.46-25.45h-30z"></path><path fill="#f85565" d="m48.13 105h31.74l-.39-4h-30.96z"></path><path fill="#ffd8c9" d="m76 96a12 12 0 0 1 -24 0z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 83v12"></path><circle r="7" fill="#fbc0aa" cy="60" cx="39"></circle><path fill="#ffd8c9" d="m64 90a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path stroke-width="5" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 64.75v6.5"></path><path fill="#515570" d="m64.83 18.35a27.51 27.51 0 0 0 -28.32 27.47v4.76a2 2 0 0 0 2 2h.58a1 1 0 0 0 .86-.49l4.05-7.09 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 4 7.09a1 1 0 0 0 .86.49h.58a2 2 0 0 0 2-2v-4.18c.05-14.95-11.66-27.61-26.61-28.05z"></path><path fill="#f85565" d="m47.35 113h33.29l-.38-4h-32.52z"></path><path fill="#f85565" d="m46.58 121h34.84l-.39-4h-34.06z"></path><path opacity=".7" fill="#ff8475" d="m58.52 79.39c0-.84 11-.84 11 0 0 1.79-2.45 3.25-5.48 3.25s-5.52-1.46-5.52-3.25z"></path><path opacity=".7" fill="#f85565" d="m69.48 79.29c0 .78-11 .78-11 0 .04-1.79 2.52-3.29 5.52-3.29s5.48 1.5 5.48 3.29z"></path><circle r="3" fill="#515570" cy="58.75" cx="76.25"></circle><path stroke-linejoin="round" stroke-linecap="round" stroke="#515570" fill="none" d="m70.75 59.84a6.61 6.61 0 0 1 11.5-1.31"></path><path style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke:#515570;stroke-width:2;opacity:.2" d="m72.11 51.46 5.68-.4a4.62 4.62 0 0 1 4.21 2.1l.77 1.21"></path><circle r="3" fill="#515570" cy="58.75" cx="51.75"></circle><g stroke-linecap="round" fill="none"><path stroke-linejoin="round" stroke="#515570" d="m57.25 59.84a6.61 6.61 0 0 0 -11.5-1.31"></path><path stroke-width="2" stroke-linejoin="round" stroke="#515570" opacity=".2" d="m55.89 51.45-5.68-.39a4.59 4.59 0 0 0 -4.21 2.11l-.77 1.21"></path><path stroke-miterlimit="10" stroke="#f85565" d="m57.25 78.76a17.4 17.4 0 0 0 6.75 1.12 17.4 17.4 0 0 0 6.75-1.12"></path></g></svg></div>
                <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ff8475" cy="64" cx="64"></circle><circle r="48" opacity=".4" fill="#f85565" cy="64" cx="64"></circle><path fill="#7f3838" d="m64 14a32 32 0 0 1 32 32v41a6 6 0 0 1 -6 6h-52a6 6 0 0 1 -6-6v-41a32 32 0 0 1 32-32z"></path><path opacity=".4" fill="#393c54" d="m62.73 22h2.54a23.73 23.73 0 0 1 23.73 23.73v42.82a4.45 4.45 0 0 1 -4.45 4.45h-41.1a4.45 4.45 0 0 1 -4.45-4.45v-42.82a23.73 23.73 0 0 1 23.73-23.73z"></path><circle r="7" fill="#fbc0aa" cy="65" cx="89"></circle><path fill="#4bc190" d="m64 124a59.67 59.67 0 0 0 34.69-11.06l-3.32-9.3a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.32 9.3a59.67 59.67 0 0 0 34.69 11.06z"></path><path opacity=".3" fill="#356cb6" d="m45 110 5.55 2.92-2.55 8.92a60.14 60.14 0 0 0 9 1.74v-27.08l-12.38 10.25a2 2 0 0 0 .38 3.25z"></path><path opacity=".3" fill="#356cb6" d="m71 96.5v27.09a60.14 60.14 0 0 0 9-1.74l-2.54-8.93 5.54-2.92a2 2 0 0 0 .41-3.25z"></path><path fill="#fff" d="m57 123.68a58.54 58.54 0 0 0 14 0v-25.68h-14z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 88.75v9.75"></path><circle r="7" fill="#fbc0aa" cy="65" cx="39"></circle><path fill="#ffd8c9" d="m64 91a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path fill="#bc5b57" d="m91.49 51.12v-4.72c0-14.95-11.71-27.61-26.66-28a27.51 27.51 0 0 0 -28.32 27.42v5.33a2 2 0 0 0 2 2h6.81a8 8 0 0 0 6.5-3.33l4.94-6.88a18.45 18.45 0 0 1 1.37 1.63 22.84 22.84 0 0 0 17.87 8.58h13.45a2 2 0 0 0 2.04-2.03z"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m62.76 36.94c4.24 8.74 10.71 10.21 16.09 10.21h5"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m71 35c2.52 5.22 6.39 6.09 9.6 6.09h3"></path><circle r="3" fill="#515570" cy="62.28" cx="76"></circle><circle r="3" fill="#515570" cy="62.28" cx="52"></circle><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="50.42"></ellipse><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="77.58"></ellipse><g stroke-linejoin="round" stroke-linecap="round" fill="none"><path stroke-width="4" stroke="#fbc0aa" d="m64 67v4"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m55 56h-9.25"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m82 56h-9.25"></path></g><path opacity=".4" fill="#f85565" d="m64 84c5 0 7-3 7-3h-14s2 3 7 3z"></path><path fill="#f85565" d="m65.07 78.93-.55.55a.73.73 0 0 1 -1 0l-.55-.55c-1.14-1.14-2.93-.93-4.27.47l-1.7 1.6h14l-1.66-1.6c-1.34-1.4-3.13-1.61-4.27-.47z"></path></svg></div>
            </div>
            <div class="card__menu"><svg xmlns="http://www.w3.org/2000/svg" width="4" viewBox="0 0 4 20" height="20" fill="none"><g fill="#000"><path d="m2 4c1.10457 0 2-.89543 2-2s-.89543-2-2-2-2 .89543-2 2 .89543 2 2 2z"></path><path d="m2 12c1.10457 0 2-.8954 2-2 0-1.10457-.89543-2-2-2s-2 .89543-2 2c0 1.1046.89543 2 2 2z"></path><path d="m2 20c1.10457 0 2-.8954 2-2s-.89543-2-2-2-2 .8954-2 2 .89543 2 2 2z"></path></g></svg></div>
        </div>
        <div class="card__title">Web Design templates
            Selection</div>
        <div class="card__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod.</div>
        <div class="card__indicator"><span class="card__indicator-amount">135</span> Works / <span class="card__indicator-percentage">45%</span></div>
        <div class="card__progress"><progress max="100" value="40"></progress></div>
      </div>

      <div class="itemCard col">
      <div class="card__wrapper">
          <div class="card___wrapper-acounts">
              <div class="card__score">+3</div>
              <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ffd8c9" cy="64" cx="64"></circle><circle r="48" opacity=".3" fill="#fff" cy="64" cx="64"></circle><path fill="#393c54" d="m64 14a31 31 0 0 1 31 31v41.07a9.93 9.93 0 0 1 -9.93 9.93h-42.14a9.93 9.93 0 0 1 -9.93-9.93v-41.07a31 31 0 0 1 31-31z"></path><circle r="7" fill="#fbc0aa" cy="60" cx="89"></circle><path fill="#00adfe" d="m64 124a59.7 59.7 0 0 0 34.7-11.07l-3.33-10.29a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.33 10.29a59.7 59.7 0 0 0 34.7 11.07z"></path><path fill="#ff8475" d="m46.54 121.45a59.93 59.93 0 0 0 34.92 0l-2.46-25.45h-30z"></path><path fill="#f85565" d="m48.13 105h31.74l-.39-4h-30.96z"></path><path fill="#ffd8c9" d="m76 96a12 12 0 0 1 -24 0z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 83v12"></path><circle r="7" fill="#fbc0aa" cy="60" cx="39"></circle><path fill="#ffd8c9" d="m64 90a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path stroke-width="5" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 64.75v6.5"></path><path fill="#515570" d="m64.83 18.35a27.51 27.51 0 0 0 -28.32 27.47v4.76a2 2 0 0 0 2 2h.58a1 1 0 0 0 .86-.49l4.05-7.09 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 4 7.09a1 1 0 0 0 .86.49h.58a2 2 0 0 0 2-2v-4.18c.05-14.95-11.66-27.61-26.61-28.05z"></path><path fill="#f85565" d="m47.35 113h33.29l-.38-4h-32.52z"></path><path fill="#f85565" d="m46.58 121h34.84l-.39-4h-34.06z"></path><path opacity=".7" fill="#ff8475" d="m58.52 79.39c0-.84 11-.84 11 0 0 1.79-2.45 3.25-5.48 3.25s-5.52-1.46-5.52-3.25z"></path><path opacity=".7" fill="#f85565" d="m69.48 79.29c0 .78-11 .78-11 0 .04-1.79 2.52-3.29 5.52-3.29s5.48 1.5 5.48 3.29z"></path><circle r="3" fill="#515570" cy="58.75" cx="76.25"></circle><path stroke-linejoin="round" stroke-linecap="round" stroke="#515570" fill="none" d="m70.75 59.84a6.61 6.61 0 0 1 11.5-1.31"></path><path style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke:#515570;stroke-width:2;opacity:.2" d="m72.11 51.46 5.68-.4a4.62 4.62 0 0 1 4.21 2.1l.77 1.21"></path><circle r="3" fill="#515570" cy="58.75" cx="51.75"></circle><g stroke-linecap="round" fill="none"><path stroke-linejoin="round" stroke="#515570" d="m57.25 59.84a6.61 6.61 0 0 0 -11.5-1.31"></path><path stroke-width="2" stroke-linejoin="round" stroke="#515570" opacity=".2" d="m55.89 51.45-5.68-.39a4.59 4.59 0 0 0 -4.21 2.11l-.77 1.21"></path><path stroke-miterlimit="10" stroke="#f85565" d="m57.25 78.76a17.4 17.4 0 0 0 6.75 1.12 17.4 17.4 0 0 0 6.75-1.12"></path></g></svg></div>
              <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ff8475" cy="64" cx="64"></circle><circle r="48" opacity=".4" fill="#f85565" cy="64" cx="64"></circle><path fill="#7f3838" d="m64 14a32 32 0 0 1 32 32v41a6 6 0 0 1 -6 6h-52a6 6 0 0 1 -6-6v-41a32 32 0 0 1 32-32z"></path><path opacity=".4" fill="#393c54" d="m62.73 22h2.54a23.73 23.73 0 0 1 23.73 23.73v42.82a4.45 4.45 0 0 1 -4.45 4.45h-41.1a4.45 4.45 0 0 1 -4.45-4.45v-42.82a23.73 23.73 0 0 1 23.73-23.73z"></path><circle r="7" fill="#fbc0aa" cy="65" cx="89"></circle><path fill="#4bc190" d="m64 124a59.67 59.67 0 0 0 34.69-11.06l-3.32-9.3a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.32 9.3a59.67 59.67 0 0 0 34.69 11.06z"></path><path opacity=".3" fill="#356cb6" d="m45 110 5.55 2.92-2.55 8.92a60.14 60.14 0 0 0 9 1.74v-27.08l-12.38 10.25a2 2 0 0 0 .38 3.25z"></path><path opacity=".3" fill="#356cb6" d="m71 96.5v27.09a60.14 60.14 0 0 0 9-1.74l-2.54-8.93 5.54-2.92a2 2 0 0 0 .41-3.25z"></path><path fill="#fff" d="m57 123.68a58.54 58.54 0 0 0 14 0v-25.68h-14z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 88.75v9.75"></path><circle r="7" fill="#fbc0aa" cy="65" cx="39"></circle><path fill="#ffd8c9" d="m64 91a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path fill="#bc5b57" d="m91.49 51.12v-4.72c0-14.95-11.71-27.61-26.66-28a27.51 27.51 0 0 0 -28.32 27.42v5.33a2 2 0 0 0 2 2h6.81a8 8 0 0 0 6.5-3.33l4.94-6.88a18.45 18.45 0 0 1 1.37 1.63 22.84 22.84 0 0 0 17.87 8.58h13.45a2 2 0 0 0 2.04-2.03z"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m62.76 36.94c4.24 8.74 10.71 10.21 16.09 10.21h5"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m71 35c2.52 5.22 6.39 6.09 9.6 6.09h3"></path><circle r="3" fill="#515570" cy="62.28" cx="76"></circle><circle r="3" fill="#515570" cy="62.28" cx="52"></circle><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="50.42"></ellipse><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="77.58"></ellipse><g stroke-linejoin="round" stroke-linecap="round" fill="none"><path stroke-width="4" stroke="#fbc0aa" d="m64 67v4"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m55 56h-9.25"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m82 56h-9.25"></path></g><path opacity=".4" fill="#f85565" d="m64 84c5 0 7-3 7-3h-14s2 3 7 3z"></path><path fill="#f85565" d="m65.07 78.93-.55.55a.73.73 0 0 1 -1 0l-.55-.55c-1.14-1.14-2.93-.93-4.27.47l-1.7 1.6h14l-1.66-1.6c-1.34-1.4-3.13-1.61-4.27-.47z"></path></svg></div>
          </div>
          <div class="card__menu"><svg xmlns="http://www.w3.org/2000/svg" width="4" viewBox="0 0 4 20" height="20" fill="none"><g fill="#000"><path d="m2 4c1.10457 0 2-.89543 2-2s-.89543-2-2-2-2 .89543-2 2 .89543 2 2 2z"></path><path d="m2 12c1.10457 0 2-.8954 2-2 0-1.10457-.89543-2-2-2s-2 .89543-2 2c0 1.1046.89543 2 2 2z"></path><path d="m2 20c1.10457 0 2-.8954 2-2s-.89543-2-2-2-2 .8954-2 2 .89543 2 2 2z"></path></g></svg></div>
      </div>
      <div class="card__title">Web Design templates
          Selection</div>
      <div class="card__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod.</div>
      <div class="card__indicator"><span class="card__indicator-amount">135</span> Works / <span class="card__indicator-percentage">45%</span></div>
      <div class="card__progress"><progress max="100" value="40"></progress></div>
    </div>

    <div class="itemCard col">
      <div class="card__wrapper">
          <div class="card___wrapper-acounts">
              <div class="card__score">+3</div>
              <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ffd8c9" cy="64" cx="64"></circle><circle r="48" opacity=".3" fill="#fff" cy="64" cx="64"></circle><path fill="#393c54" d="m64 14a31 31 0 0 1 31 31v41.07a9.93 9.93 0 0 1 -9.93 9.93h-42.14a9.93 9.93 0 0 1 -9.93-9.93v-41.07a31 31 0 0 1 31-31z"></path><circle r="7" fill="#fbc0aa" cy="60" cx="89"></circle><path fill="#00adfe" d="m64 124a59.7 59.7 0 0 0 34.7-11.07l-3.33-10.29a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.33 10.29a59.7 59.7 0 0 0 34.7 11.07z"></path><path fill="#ff8475" d="m46.54 121.45a59.93 59.93 0 0 0 34.92 0l-2.46-25.45h-30z"></path><path fill="#f85565" d="m48.13 105h31.74l-.39-4h-30.96z"></path><path fill="#ffd8c9" d="m76 96a12 12 0 0 1 -24 0z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 83v12"></path><circle r="7" fill="#fbc0aa" cy="60" cx="39"></circle><path fill="#ffd8c9" d="m64 90a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path stroke-width="5" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 64.75v6.5"></path><path fill="#515570" d="m64.83 18.35a27.51 27.51 0 0 0 -28.32 27.47v4.76a2 2 0 0 0 2 2h.58a1 1 0 0 0 .86-.49l4.05-7.09 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 2.47 4.13a1 1 0 0 0 1.72 0l2.47-4.13 2.48 4.13a1 1 0 0 0 1.71 0l2.48-4.13 4 7.09a1 1 0 0 0 .86.49h.58a2 2 0 0 0 2-2v-4.18c.05-14.95-11.66-27.61-26.61-28.05z"></path><path fill="#f85565" d="m47.35 113h33.29l-.38-4h-32.52z"></path><path fill="#f85565" d="m46.58 121h34.84l-.39-4h-34.06z"></path><path opacity=".7" fill="#ff8475" d="m58.52 79.39c0-.84 11-.84 11 0 0 1.79-2.45 3.25-5.48 3.25s-5.52-1.46-5.52-3.25z"></path><path opacity=".7" fill="#f85565" d="m69.48 79.29c0 .78-11 .78-11 0 .04-1.79 2.52-3.29 5.52-3.29s5.48 1.5 5.48 3.29z"></path><circle r="3" fill="#515570" cy="58.75" cx="76.25"></circle><path stroke-linejoin="round" stroke-linecap="round" stroke="#515570" fill="none" d="m70.75 59.84a6.61 6.61 0 0 1 11.5-1.31"></path><path style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke:#515570;stroke-width:2;opacity:.2" d="m72.11 51.46 5.68-.4a4.62 4.62 0 0 1 4.21 2.1l.77 1.21"></path><circle r="3" fill="#515570" cy="58.75" cx="51.75"></circle><g stroke-linecap="round" fill="none"><path stroke-linejoin="round" stroke="#515570" d="m57.25 59.84a6.61 6.61 0 0 0 -11.5-1.31"></path><path stroke-width="2" stroke-linejoin="round" stroke="#515570" opacity=".2" d="m55.89 51.45-5.68-.39a4.59 4.59 0 0 0 -4.21 2.11l-.77 1.21"></path><path stroke-miterlimit="10" stroke="#f85565" d="m57.25 78.76a17.4 17.4 0 0 0 6.75 1.12 17.4 17.4 0 0 0 6.75-1.12"></path></g></svg></div>
              <div class="card__acounts"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><circle r="60" fill="#ff8475" cy="64" cx="64"></circle><circle r="48" opacity=".4" fill="#f85565" cy="64" cx="64"></circle><path fill="#7f3838" d="m64 14a32 32 0 0 1 32 32v41a6 6 0 0 1 -6 6h-52a6 6 0 0 1 -6-6v-41a32 32 0 0 1 32-32z"></path><path opacity=".4" fill="#393c54" d="m62.73 22h2.54a23.73 23.73 0 0 1 23.73 23.73v42.82a4.45 4.45 0 0 1 -4.45 4.45h-41.1a4.45 4.45 0 0 1 -4.45-4.45v-42.82a23.73 23.73 0 0 1 23.73-23.73z"></path><circle r="7" fill="#fbc0aa" cy="65" cx="89"></circle><path fill="#4bc190" d="m64 124a59.67 59.67 0 0 0 34.69-11.06l-3.32-9.3a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.32 9.3a59.67 59.67 0 0 0 34.69 11.06z"></path><path opacity=".3" fill="#356cb6" d="m45 110 5.55 2.92-2.55 8.92a60.14 60.14 0 0 0 9 1.74v-27.08l-12.38 10.25a2 2 0 0 0 .38 3.25z"></path><path opacity=".3" fill="#356cb6" d="m71 96.5v27.09a60.14 60.14 0 0 0 9-1.74l-2.54-8.93 5.54-2.92a2 2 0 0 0 .41-3.25z"></path><path fill="#fff" d="m57 123.68a58.54 58.54 0 0 0 14 0v-25.68h-14z"></path><path stroke-width="14" stroke-linejoin="round" stroke-linecap="round" stroke="#fbc0aa" fill="none" d="m64 88.75v9.75"></path><circle r="7" fill="#fbc0aa" cy="65" cx="39"></circle><path fill="#ffd8c9" d="m64 91a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z"></path><path fill="#bc5b57" d="m91.49 51.12v-4.72c0-14.95-11.71-27.61-26.66-28a27.51 27.51 0 0 0 -28.32 27.42v5.33a2 2 0 0 0 2 2h6.81a8 8 0 0 0 6.5-3.33l4.94-6.88a18.45 18.45 0 0 1 1.37 1.63 22.84 22.84 0 0 0 17.87 8.58h13.45a2 2 0 0 0 2.04-2.03z"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m62.76 36.94c4.24 8.74 10.71 10.21 16.09 10.21h5"></path><path style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1" d="m71 35c2.52 5.22 6.39 6.09 9.6 6.09h3"></path><circle r="3" fill="#515570" cy="62.28" cx="76"></circle><circle r="3" fill="#515570" cy="62.28" cx="52"></circle><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="50.42"></ellipse><ellipse ry="2.98" rx="4.58" opacity=".1" fill="#f85565" cy="69.67" cx="77.58"></ellipse><g stroke-linejoin="round" stroke-linecap="round" fill="none"><path stroke-width="4" stroke="#fbc0aa" d="m64 67v4"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m55 56h-9.25"></path><path stroke-width="2" stroke="#515570" opacity=".2" d="m82 56h-9.25"></path></g><path opacity=".4" fill="#f85565" d="m64 84c5 0 7-3 7-3h-14s2 3 7 3z"></path><path fill="#f85565" d="m65.07 78.93-.55.55a.73.73 0 0 1 -1 0l-.55-.55c-1.14-1.14-2.93-.93-4.27.47l-1.7 1.6h14l-1.66-1.6c-1.34-1.4-3.13-1.61-4.27-.47z"></path></svg></div>
          </div>
          <div class="card__menu"><svg xmlns="http://www.w3.org/2000/svg" width="4" viewBox="0 0 4 20" height="20" fill="none"><g fill="#000"><path d="m2 4c1.10457 0 2-.89543 2-2s-.89543-2-2-2-2 .89543-2 2 .89543 2 2 2z"></path><path d="m2 12c1.10457 0 2-.8954 2-2 0-1.10457-.89543-2-2-2s-2 .89543-2 2c0 1.1046.89543 2 2 2z"></path><path d="m2 20c1.10457 0 2-.8954 2-2s-.89543-2-2-2-2 .8954-2 2 .89543 2 2 2z"></path></g></svg></div>
      </div>
      <div class="card__title">Web Design templates
          Selection</div>
      <div class="card__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod.</div>
      <div class="card__indicator"><span class="card__indicator-amount">135</span> Works / <span class="card__indicator-percentage">45%</span></div>
      <div class="card__progress"><progress max="100" value="40"></progress></div>
    </div>

    </div>
  </div>



  <?php include 'footer.php' ?>


</body>

</html>