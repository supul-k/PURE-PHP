<?php
include './menu.inc';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit();
}
?>

<div id="container-jobs">

    <h1 id="heading1">Job Positions</h1>
    <div class="job_position_container">
        <div class="job_positions">
            <h2 class="position">Game Developer</h2>
            <h3 id="refNumber">Ref:011AA</h3>

            <figure class="figure3">
                <img src="images/man.jpg" alt="s-icon" width="70" height="70">
            </figure>
            <hr color="black" size="1px" />
            <ul class="jobdetails">


                <a href="./apply.php?refNumber=011AA">Apply Now</a>
                <li><b>Description :</b><br>
                    We are seeking a highly motivated and experienced Game Developer to join our team.<br>
                    The Game Developer will be responsible for designing, developing, and implementing high-quality games for various platforms such as mobile, PC, and console.<br>
                    The ideal candidate should have experience in game design, programming, and 3D graphics, with a strong understanding of game engines and development tools.</li>
                <li><b>Salary Range :</b> $120,000 per year</li>
                <li><b>Title of the position :</b> Associate Game developing Engineer</li>
                <li><b>Key resposibilities:</b></li>
                <ol>
                    <li>Write clean, efficient, and well-documented code in C++, C#, or other programming languages.</li>
                    <li>Develop and implement game mechanics, user interfaces, and game logic.</li>
                    <li>Collaborate with a team of designers, artists, and programmers to develop high-quality video games.</li>
                    <li>Work with project managers to plan and prioritize tasks, and meet project deadlines.</li>
                </ol>
                <li>
                    <b>Qualification/skills :</b>
                    <ul>
                        <li>Essential :</li>
                        <ol>
                            <li>Bachelor's or Master's degree in Computer Science or a related field.</li>
                            <li>3+ years of experience in game development, with a focus on programming.</li>
                            <li>Strong proficiency in C++, C#, or other programming languages commonly used in game development.</li>
                            <li>Familiarity with game engines such as Unity, Unreal, or CryEngine.</li>
                        </ol>
                        <li>Preferable :</li>
                        <ol>
                            <li>Experience with 2D and/or 3D game engines and tools such as OpenGL, DirectX, Maya, and Blender.</li>
                            <li>Familiarity with mobile game development for iOS and Android platforms.</li>
                            <li>Knowledge of scripting languages such as Lua or Python.</li>
                        </ol>
                    </ul>
                </li>
            </ul>
            <!-- <a href="apply.html?refNumber=JOB001">Apply</a> -->

            <h4 class="closingdate">Closing Date : 14 <sup>th</sup> of April 2023</h4>
        </div>


        <div class="job_positions">
            <h2 class="position">Cybersecurity Professional</h2>
            <h3 id="job2">Ref:012BB</h3>
            <figure class="figure3">
                <img src="images/man.jpg" alt="s-icon" width="70" height="70">
            </figure>
            <hr color="black" size="1px" />
            <ul class="jobdetails">
                <a href="./apply.php?refNumber=012BB">Apply Now</a>
                <li><b>Description :</b><br>
                    We are seeking a highly motivated and experienced Cyber Security Analyst to join our team.<br>
                    The ideal candidate should have a strong background in cyber security and information security, with experience in network security, risk management, and incident response.<br>
                    The Cyber Security Analyst will be responsible for monitoring our organization's networks, systems, and applications for security threats and vulnerabilities.</li>
                <li><b>Salary Range :</b> $158,000 per year</li>
                <li><b>Title of the position :</b> Senior Cybersecurity Engineer</li>
                <li><b>Key resposibilities:</b></li>
                <ol>
                    <li>Develop and implement security policies, procedures, and standards to protect company assets and data.</li>
                    <li>Conduct security assessments and penetration testing to identify vulnerabilities and recommend solutions.</li>
                    <li>Design and deploy security solutions, including firewalls, intrusion detection systems, and data encryption technologies.</li>
                    <li>Respond to security incidents and perform incident analysis and forensics investigations.</li>
                </ol>
                <li>
                    <b>Qualification/skills :</b>
                    <ul>
                        <li>Essential :</li>
                        <ol>
                            <li>Bachelor's or Master's degree in Computer Science, Cyber Security, or a related field.</li>
                            <li>5+ years of experience in cyber security or information security</li>
                            <li>Strong understanding of security protocols, cryptography, and network security.</li>
                            <li>Good understanding of security compliance regulations such as HIPAA, PCI DSS, or GDPR.</li>
                        </ol>
                        <li>Preferable :</li>
                        <ol>
                            <li>Industry certifications such as CISSP, CISM, or CEH.</li>
                            <li>Familiarity with cloud security, DevOps, and automation technologies.</li>
                            <li>Knowledge of programming languages such as Python or PowerShell.</li>
                        </ol>
                    </ul>
                </li>
            </ul>


            <h4 class="closingdate">Closing Date : 29 <sup>th</sup> of May 2023</h4>
        </div>
        <div class="job_positions">
            <h2 class="position">Software Engineer</h2>
            <h3 id="job3">Ref:013CC</h3>
            <figure class="figure3">
                <img src="images/man.jpg" alt="s-icon" width="70" height="70">
            </figure>
            <hr color="black" size="1px" />
            <ul class="jobdetails">
                <a href="./apply.php?refNumber=013CC">Apply Now</a>
                <li><b>Description :</b><br>
                    As a game developer, you'll be responsible for bringing video games to life through programming, game design, and collaboration with a team of artists and designers.<br>
                    You'll need to have strong coding skills, experience with game engines, and a passion for gaming. Salaries for game developers can vary depending on your location, level of experience, and the specific company you work for</li>
                <li><b>Salary Range :</b> $90,000 per year</li>
                <li><b>Title of the position :</b> Associate Game developing Engineer</li>
                <li><b>Key resposibilities:</b></li>
                <ol>
                    <li>Collaborate with a team of developers, designers, and product managers to develop high-quality software applications</li>
                    <li>Write clean, efficient, and well-documented code in one or more programming languages such as Java, Python, or C++.</li>
                    <li>Develop and implement software features and functionalities based on user requirements and specifications.</li>
                    <li>Participate in code reviews, design discussions, and brainstorming sessions to improve the software development process.</li>
                </ol>
                <li>
                    <b>Qualification/skills :</b>
                    <ul>
                        <li>Essential :</li>
                        <ol>
                            <li>Bachelor's or Master's degree in Computer Science, Software Engineering, or a related field.</li>
                            <li>3+ years of experience in software development, with a focus on programming.</li>
                            <li>Strong proficiency in one or more programming languages such as Java, Python, or C++.</li>
                            <li>Familiarity with software development tools such as Git, JIRA, or Agile methodologies.</li>
                        </ol>
                        <li>Preferable :</li>
                        <ol>
                            <li>Familiarity with web development frameworks such as React, Angular, or Vue.</li>
                            <li>Experience with database technologies such as SQL or NoSQL.</li>
                            <li>Knowledge of cloud technologies such as AWS, Azure, or Google Cloud Platform</li>
                        </ol>
                    </ul>
                </li>
            </ul>

            <h4 class="closingdate">Closing Date : 15 <sup>th</sup> of May 2023</h4>
        </div>
        <div class="job_positions">
            <h2 class="position">Cluod Engineer</h2>
            <h3 id="job4" value='014DD'>Ref : 014DD</h3>
            <figure class="figure3">
                <img src="images/man.jpg" alt="s-icon" width="70" height="70">
            </figure>
            <hr color="black" size="1px" />
            <ul class="jobdetails">
                <a href="./apply.php?refNumber=014DD">Apply Now</a>
                <li><b>Description :</b><br>
                    We are seeking a highly motivated and experienced Cloud Engineer to join our team.<br>
                    The Cloud Engineer will be responsible for designing, deploying, and maintaining cloud-based infrastructure using technologies such as AWS, Azure, or Google Cloud Platform.<br>
                    The ideal candidate should have experience in cloud engineering or cloud architecture, with a strong understanding of cloud technologies, automation tools, and containerization..</li>
                <li><b>Salary Range :</b> $105,000 per year</li>
                <li><b>Title of the position :</b> Associate Game developing Engineer</li>
                <li><b>Key resposibilities:</b></li>
                <ol>
                    <li>Design, deploy, and maintain cloud-based infrastructure using technologies such as AWS, Azure, or Google Cloud Platform.</li>
                    <li>Develop and implement automation scripts for cloud infrastructure management, configuration, and deployment.</li>
                    <li>Collaborate with development teams to design and deploy scalable and reliable cloud-based solutions.</li>
                    <li>Implement and manage cloud security and compliance measures, such as data encryption, access controls, and security monitoring.</li>
                </ol>
                <li>
                    <b>Qualification/skills :</b>
                    <ul>
                        <li>Essential :</li>
                        <ol>
                            <li>Bachelor's or Master's degree in Computer Science, Information Technology, or a related field.</li>
                            <li>3+ years of experience in cloud engineering or cloud architecture.</li>
                            <li>Strong proficiency in cloud technologies such as AWS, Azure, or Google Cloud Platform.</li>
                            <li>Experience with automation tools such as Terraform, Ansible, or Chef.</li>
                        </ol>
                        <li>Preferable :</li>
                        <ol>
                            <li>Industry certifications such as AWS Certified Solutions Architect, Microsoft Certified Azure Solutions Architect, or Google Certified Professional Cloud Architect.</li>
                            <li>Familiarity with DevOps practices and methodologies.</li>
                            <li>Experience with serverless technologies such as AWS Lambda or Azure Function.</li>
                        </ol>
                    </ul>
                </li>
            </ul>

            <h4 class="closingdate">Closing Date :29 <sup>th</sup> of April 2023</h4>
        </div>

    </div>

    <aside>
        <h3 id="a_color">Why You choose us? ?</h3>
        <p><b>Company Overview:</b><br>
            Our IT company specializes in providing cutting-edge software solutions to businesses across various industries. Our mission is to help our clients increase their efficiency and productivity through innovative technology solutions. We are committed to upholding our values of excellence, collaboration, and customer satisfaction.</p>
        <p><b>Employee Benefits:</b><br>
            We offer a comprehensive benefits package that includes health, dental, and vision insurance, retirement plans, paid time off, and opportunities for professional development. We also offer a flexible work schedule and a supportive work environment.</p>
        <p><b>Career Growth Opportunities:</b><br>
            We are committed to providing employees with opportunities to grow and advance within the organization. We offer training programs, mentorship, and leadership development initiatives to help employees achieve their career goals.</p>
        <p><b>Company Culture:</b><br>
            Our company culture is characterized by a strong focus on innovation, collaboration, and customer satisfaction. We encourage our employees to share their ideas and work together to find creative solutions for our clients. Additionally, we are committed to giving back to our local communities through volunteerism and philanthropy.</p>
        <p><b>Awards and Recognition:</b><br>
            Our company has been recognized as a leader in the IT industry, and our employees have received numerous awards and certifications for their contributions to the field.</p>
    </aside>
</div>