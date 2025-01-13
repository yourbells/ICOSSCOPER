@extends('layouts.app')

@section('content')
<div class="speakers">
    <div class="speakers-bar">
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Rektor.jpeg" alt="speaker1">
            </div>
            <p>
                Prof. Dr. Baharuddin, S.T., M.Pd <br>
                Rector of Universitas Negeri Medan <br>
                Opening Speach
            </p>
        </div>
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Dekan.jpeg" alt="speaker2">
            </div>
            <p>
                Prof. Dr. Imran Akhmad, M.Pd <br>
                Dean of Faculty Of Sport Science UNIMED <br>
                Opening Speach
            </p>
        </div>
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Syawal.jpeg" alt="speaker3">
            </div>
            <p>
                Prof. Dr. Syawal Gultom, M.Pd <br>
                Universitas Negeri Medan <br>
                Keynote Speakers
            </p>
        </div>
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Anizu.jpeg" alt="speaker4">
            </div>
            <p>
                Prof. Mohad Anizu Bin Haji Mohd Nor <br>
                UITM, Malaysia <br>
                Speakers 1
            </p>
        </div>
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Runchai.jpeg" alt="speaker5">
            </div>
            <p>
                Assoc. Prof. Runcai Chaunchaiyakul <br>
                Mahidol University, Thailand <br>
                Speakers 2
            </p>
        </div>
        <div class="speakers-item">
            <div class="speakers-img">
                <img src="img/Rajesh.jpeg" alt="speaker6">
            </div>
            <p>
                Dr. Rajesh Kumar <br>
                Osmania University, India <br>
                Speakers 3
            </p>
        </div>
    </div>
</div>      
    <div class="title">
        <h1>International Conference of Sport Science Sport Coaching Science and Physical Education and Recreation</h1>
            <p>The era of the industrial revolution 5.0 brings very rapid changes accompanied by increasingly sophisticated technological developments through the presence of digital economy, 
                artificial intelligence, big data, robotics, and others. Society 5.0 emphasizes the integration of advanced technologies such as AI, IoT, 
                and robotic technology with human expertise and innovation that can drive the development of more efficient, flexible, 
                sustainable production systems and improve welfare. This aims to create a production system that is more adaptive to changes in market demand, 
                more focused on customer experience, and optimizes the use of limited natural resources. The Faculty of Sports Science (FIK), 
                State University of Medan as one of the universities in North Sumatra should take part in controlling the direction and speed of these changes as summarized in the faculty’s vision and mission. 
                In the future, FIK is expected to produce graduates who have the competence and expertise to compete and create opportunities in the era of growing globalization.
            </p>
    </div>
    <div class="theme">
        <h3>Innovative Approaches to Integrate Sport Science, choaching, physical education, and recreational Sport for a Balance lifestyle.</h3>
    </div>
    <div class="sub-theme">
        <h3>Aim and Scope </h3>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-3 ml-5">
                        <ul>
                            <li>Sports Management</li>
                            <li>Sports Performance</li>
                            <li>Sports Biomechanics</li>
                            <li>Sports Policy</li>
                            <li>Sports Medicine</li>
                            <li>Sports Psychology</li>
                        </ul>
                    </div>
                    <div class="col-sm-3 ml-5">
                        <ul>
                            <li>Sports Pedagogyt</li>
                            <li>Sports Recreation</li>
                            <li>Disability Sports</li>
                            <li>Exercise Physiology</li>
                            <li>Sports Technology</li>
                            <li>Sports Nutrition</li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    <div class="dates">
        <h1>Dates and Venue Activity</h1>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-4 ml-1">
                        <ul>
                            <li>Registration</li>
                            <li>Abstract Submission Deadline</li>
                            <li>Early Bid Registration Deadline</li>
                            <li>Abstract Accepted</li>
                            <li>Full Paper Submission Deadline</li>
                            <li>Full Paper Accepted</li>
                            <li>Normal Registration Deadline</li>
                            <li>Power Point Upload Deadline</li>
                            <li>1St ICOSSCOPER Conference Date</li>
                            <li>Jurnal Submission </li>
                        </ul>
                    </div>
                    <div class="col-sm-2 ml-5">
                        <ul>
                            <li>Sep 23, 2024</li>
                            <li>Oct 7, 2024</li>
                            <li>Oct 7, 2024</li>
                            <li>Oct 14, 2024</li>
                            <li>Oct 28, 2024</li>
                            <li>Oct 31, 2024</li>
                            <li>Nov 4, 2024</li>
                            <li>Nov 8, 2024</li>
                            <li>Nov 14, 2024</li>
                            <li>Nov 29, 2024</li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    <div class="publication">
        <h1>Publication</h1>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-6 mr-5">
                    <ul>
                        <li>Proceeding ISSN</li>
                        <li>National Indexed Journal (Additional Fee)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const speakersBar = document.querySelector(".speakers-bar");
        const items = Array.from(speakersBar.children);

        // Gandakan item untuk menciptakan efek loop
        items.forEach((item) => {
            const clone = item.cloneNode(true);
            speakersBar.appendChild(clone);
        });

        const scrollSpeed = 1; 

        function autoScroll() {
            speakersBar.scrollLeft += scrollSpeed;

            if (speakersBar.scrollLeft >= speakersBar.scrollWidth / 2) {
                speakersBar.scrollLeft = 0;
            }

            requestAnimationFrame(autoScroll);
        }

        autoScroll();
    });
</script>


@endsection