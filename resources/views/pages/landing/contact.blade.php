@extends('layouts.home_layout')
@section('content')

	  <!-- contact section -->

<style>
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.contact-parent{
    display:flex;
    margin:80px 0;
}
body{
    color: #3b4a6b;
}

.contact-child{
    display:flex;
    flex:1;
    box-shadow:0px 0px 20px -2px #3b4a6b;
}

.child1{
    background:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('images/dark.jpg') }});
    background-size:cover;
    display:flex;
    flex-direction:column;
    justify-content:space-around;
    color:#fff;
    padding:100px 0;
}

.child1 p{
    padding-left:20%;
    font-size:20px;
    text-shadow:0px 0px 2px #000;
}

.child1 p span{
    font-size:16px;
    color:#9df2fd;
}

.child2{
    flex-direction:column;
    justify-content:space-around;
    align-items:center;
}

.inside-contact{
    width:90%;
    margin:0 auto;
}

.inside-contact h2{
    text-transform:uppercase;
    text-align:center;
    margin-top:50px;
}

.inside-contact h3{
    text-align:center;
    font-size:16px;
    color:#0085e2;
}

.inside-contact input, .inside-contact textarea{
    width:100%;
    background-color:#eee;
    border:1px solid rgba(0,0,0,0.48);
    padding:5px 10px;
    margin-bottom:20px;
}

.inside-contact input[type=submit]{
    background-color:#3b4a6b;
    color:#fff;
    transition:0.2s;
    border:2px solid #3b4a6b;
    margin:30px 0;
}

.inside-contact input[type=submit]:hover{
    background-color:#fff;
    color:#000;
    transition:0.2s;
}

@media screen and (max-width:991px){
    .contact-parent{
        display:block;
        width:100%;
    }

    .child1{
        display:none;
    }

    .child2{
        background-image:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url({{ asset('images/dark.jpg') }});
        background-size:cover;
    }

    .inside-contact input, .inside-contact textarea{
        background-color:#fff;
    }
}
</style>

  {{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
   <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>   
    <link href="Style.css" rel="stylesheet" />
</head> --}}
            <div class="container">
                <div class="contact-parent">
                    <div class="contact-child child1">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> Address <br />
                            <span> Xhitiz
                                <br />
                                IT Solution
                            </span>
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i> Let's Talk <br />
                            <span> 0787878787</span>
                        </p>

                        <p>
                            <i class=" far fa-envelope"></i> General Support <br />
                            <span>xhitiz@gmail.com</span>
                        </p>
                    </div>

                    <div class="contact-child child2">
                        <div class="inside-contact">
                            <h2>Contact Us</h2>
                            <h3>
                               <span id="confirm">
                            </h3>
                        {{-- <form action="{{ route('contact.message') }}" method="POST">
                            @csrf --}}
                            <p>Name *</p>
                            <input id="name" class="name" type="text" Required="required">

                            <p>Email *</p>
                            <input id="email" class="email" type="email" Required="required">

                            <p>Phone *</p>
                            <input id="phone" class="phone" type="text" Required="required">

                            <p>Message *</p>
                            <textarea id="message" class="message" rows="4" cols="20" Required="required" ></textarea>
                            
                            <button type="submit" class="btn my-3" style="width: 100%; background-color: #F0d43a; color:white;">SEND MESSAGE</button>
                        {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- end contact section -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>   
  @stop