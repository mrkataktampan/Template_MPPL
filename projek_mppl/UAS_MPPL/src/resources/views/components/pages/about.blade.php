@extends('components.layouts.app')

@section('about')
{{-- About Section --}}
   <div class="about_section layout_padding">
      <div class="container">
         <div class="about_section_2">
            <div class="row">
               <div class="col-md-6"> 
                  <div class="image_iman"><img src="{{ asset('front/images/about-img.png') }}" class="about_img"></div>
               </div>
               <div class="col-md-6"> 
                  <div class="about_taital_box">
                     <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                     <p class="about_text">
                        Going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection