@extends('ui-display.layout.master')

@section('content')
    <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>$60 000</h4>
              <h2>Lorem ipsum dolor sit amet.</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- Banner Ends Here -->

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div>
            <img src="assets/images/product-1-720x480.jpg" alt="" class="img-fluid wc-image">
          </div>

          <br>
        </div>
      </div>
    </div>
  </section>
  <div class="row">
    <div class="container d-flex justify-content-center align-content-center">
      <div class="col-md-10">
        <div class="section contact-us">
          <div class="container">
            @if (Session('errorMsg'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session('errorMsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if ($errors->has('skills'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('skills') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Job Application Form</h3>
                </div>
                <form action="{{ url('/job-application')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" required value="{{ $jobId }}" class="form-control" name="jobId" placeholder="Enter Position ... ">
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" value="{{ Auth::user()->name }}" class="form-control @error('name')
                        is-invalid
                      @enderror" value="{{ old('name') }}" name="name" placeholder="Enter Your Name ... ">
                      @error('name')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" value="{{Auth::user()->email }}"   class="form-control @error('email')
                        is-invalid
                      @enderror" value="{{ old('email') }}" name="email" placeholder="Enter Your Email ... ">
                      @error('email')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>

                    <div class="row">
                      <div class=" col-md-4">
                        <div class="form-group" id="eduForm">
                          <label for="education">Education</label>
                          <div class="input-group">
                            <input type="text" id="education" required class="form-control @error('education[]')
                              is-invalid
                            @enderror" value="{{ old('education[]') }}" name="educations[]" placeholder="Enter Your Education ...">
                          </div>     
                          <div class="input-group">

                          </div>                   
                            @error('education[]')
                              <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                          </div>    
                          <div class="form-group" id="eduForm"> 
                            <div class="input-group">
                              
                            </div>
                          </div>
                      </div> 

                      <div class=" col-md-4">
                        <div class="form-group" id="schoolForm">
                          <label for="school">School</label>
                          <div class="input-group">
                            <input type="text" id="school" required class="form-control @error('schools[]')
                              is-invalid
                            @enderror" value="{{ old('schools[]') }}" name="schools[]" placeholder="Enter Your school ...">
                         </div>     
                          <div class="input-group">

                          </div>                   
                            @error('schools[]')
                              <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                          </div>    
                          <div class="form-group" id="schoolForm"> 
                            <div class="input-group">
                              
                            </div>
                          </div>
                      </div> 

                      <div class=" col-md-4">
                        <div class="form-group" id="yearForm">
                          <label for="year">Year</label>
                          <div class="input-group">
                            <input type="text" id="year" required class="form-control @error('years[]')
                              is-invalid
                            @enderror" value="{{ old('year[]') }}" name="years[]" placeholder="Enter Your year ...">
                            <button type="button" onclick="hideForm()" class=" btn btn-primary mx-2" id="addBtn">+</button>
                          </div>     
                          <div class="input-group">

                          </div>                   
                            @error('years[]')
                              <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                          </div>    
                          <div class="col-md-4 form-group" id="yearForm"> 
                            <div class="input-group">
                              
                            </div>
                          </div>
                      </div> 

                    </div>


                    
                    <div class="">
                      <div class="form-group" id="skillForm">
                        <label for="skill">SKill</label>
                        <div class="input-group">
                          <input type="text" id="skill" required class="form-control @error('skill[]')
                            is-invalid
                          @enderror" value="{{ old('skill[]') }}" name="skills[]" placeholder="Enter Your Skills ...">
                          <button type="button" onclick="addSkillForm()" class=" btn btn-primary " id="addBtn">+</button>
                        </div>     
                        <div class="input-group">

                        </div>                   
                          @error('skill[]')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                          @enderror
                        </div>    
                        <div class="form-group" id="skillForm"> 
                          <div class="input-group">
                            
                          </div>
                        </div>
                    </div> 

                    <div class="form-group">
                      <label for="experience">Experience</label>
                      <textarea name="experience" class="form-control @error('experience')
                        is-invalid
                      @enderror"cols="20" rows="10" placeholder="Enter Your Experience ... "> {{ old('experience') }}</textarea>
                      @error('experience')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="expected_salary">Expected Salary</label>
                      <input type="number" class="form-control @error('expected_salary')
                        is-invalid
                      @enderror" value="{{ old('expected_salary') }}" name="expected_salary" placeholder="Enter Your Expected Salary ... ">
                      @error('expected_salary')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>
                  </div>

                  <div class="card-footer">
                    <button formaction="{{ url('/job-application')}}" type="submit" class="btn btn-primary float-end">Apply</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    function addSkillForm() {
      var form = document.getElementById('skillForm');
      var skillContainer = document.createElement('div');
      skillContainer.classList.add('skill-input', 'd-flex', 'align-items-center','input-group');

      var skillNameInput = document.createElement('input');
      skillNameInput.type = 'text';
      skillNameInput.name = 'skills[]';
      skillNameInput.classList.add('form-control', 'mt-2', );
      skillNameInput.placeholder = 'Enter Your Skill...';

      var removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.classList.add('btn', 'btn-danger', 'mt-2' , 'rounded-right-0');
      removeButton.innerText = '-';
      removeButton.onclick = function () {
          form.removeChild(skillContainer);
      };

      skillContainer.appendChild(skillNameInput);
      skillContainer.appendChild(removeButton);
      form.appendChild(skillContainer);
    }

    function hideForm() {
      var eduForm = document.getElementById('eduForm');
      var eduContainer = document.createElement('div');
      eduContainer.classList.add('skill-input', 'd-flex', 'align-items-center','input-group');

      var eduInput = document.createElement('input');
      eduInput.type = 'text';
      eduInput.name = 'educations[]';
      eduInput.classList.add('form-control', 'mt-2', );
      eduInput.placeholder = 'Enter Your Education...';


      eduContainer.appendChild(eduInput);
      eduForm.appendChild(eduContainer);

      var schoolForm = document.getElementById('schoolForm');
      var schoolContainer = document.createElement('div');
      schoolContainer.classList.add('skill-input', 'd-flex', 'align-items-center','input-group');

      var schoolInput = document.createElement('input');
      schoolInput.type = 'text';
      schoolInput.name = 'schools[]';
      schoolInput.classList.add('form-control', 'mt-2', );
      schoolInput.placeholder = 'Enter Your School...';

      schoolContainer.appendChild(schoolInput);
      schoolForm.appendChild(schoolContainer);

      var form = document.getElementById('yearForm');
      var yearContainer = document.createElement('div');
      yearContainer.classList.add('skill-input', 'd-flex', 'align-items-center','input-group');

      var yearInput = document.createElement('input');
      yearInput.type = 'text';
      yearInput.name = 'years[]';
      yearInput.classList.add('form-control', 'mt-2', );
      yearInput.placeholder = 'Enter Your Attended Year...';

      var removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.classList.add('btn', 'btn-danger', 'mt-2' ,'mx-2', 'rounded-right-0');
      removeButton.innerText = '-';
      removeButton.onclick = function () {
          form.removeChild(yearContainer);
          eduForm.removeChild(eduContainer);
          schoolForm.removeChild(schoolContainer);
      };

      yearContainer.appendChild(yearInput);
      yearContainer.appendChild(removeButton);
      form.appendChild(yearContainer);
    }
  </script>
@endsection


