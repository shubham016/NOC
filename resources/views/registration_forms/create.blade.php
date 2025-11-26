@extends('layouts.app')

@section('title', 'New Registration Form')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">NOC | Employee Vacancy Registration Form</h4>
        </div>

        <div class="card-body">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Progress Bar --}}
            <div class="mb-4">
                <div class="progress" style="height: 38px;">
                    <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 14%;">
                        Step 1 of 7
                    </div>
                </div>
            </div>

            <form action="{{ route('registration-forms.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                @csrf

                {{-- STEP 1: Personal Info --}}
                <div class="step" id="step1">
                    <h5 class="mb-4 text-primary">Step 1 — Personal Information</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span> <small>(नाम)</small></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="birth_date_ad" class="form-label">Birth Date (A.D) <span class="text-danger">*</span> <small>(जन्म मिति A.D)</small></label>
                            <input type="date" name="birth_date_ad" id="birth_date_ad" class="form-control" value="{{ old('birth_date_ad') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="birth_date_bs" class="form-label">Birth Date (B.S) <span class="text-danger">*</span> <small>(जन्म मिति B.S)</small></label>
                            <input type="text" name="birth_date_bs" id="birth_date_bs" class="form-control" placeholder="YYYY-MM-DD" value="{{ old('birth_date_bs') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="age" class="form-label">Age <span class="text-danger">*</span> <small>(उमेर)</small></label>
                            <input type="number" name="age" id="age" class="form-control" min="0" value="{{ old('age') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span> <small>(फोन नम्बर)</small></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span> <small>(लिङ्ग)</small></label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="">-- Select / छान्नुहोस् --</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male / पुरुष</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female / महिला</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other / अन्य</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
                            <select name="marital_status" id="marital_status" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="citizenship_number" class="form-label">Citizenship Number <span class="text-danger">*</span></label>
                            <input type="text" name="citizenship_number" id="citizenship_number" class="form-control" value="{{ old('citizenship_number') }}" required>
                        </div>
                        </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="citizenship_issue_date" class="form-label">Citizenship Issue Date (BS)</label>
                            <input type="date" name="citizenship_issue_date" id="citizenship_issue_date" class="form-control" value="{{ old('citizenship_issue_date')}}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="citizenship_issue_district" class="form-label">Citizenship Issue District <span class="text-danger">*</span></label>
                            <input type="text" name="citizenship_issue_district" id="citizenship_issue_district" class="form-control" value="{{ old('citizenship_issue_district') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="father_name_english" class="form-label">Father Name (बुबाको नाम) <span class="text-danger">*</span></label>
                            <input type="text" name="father_name_english" id="father_name_english" class="form-control" value="{{ old('father_name_english') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="mother_name_english" class="form-label">Mother Name (आमाको नाम) <span class="text-danger">*</span></label>
                            <input type="text" name="mother_name_english" id="mother_name_english" class="form-control" value="{{ old('mother_name_english') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="grandfather_name_english" class="form-label">Grandfather Name (हजुरबुबाको नाम) <span class="text-danger">*</span></label>
                            <input type="text" name="grandfather_name_english" id="grandfather_name_english" class="form-control" value="{{ old('grandfather_name_english') }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="father_qualification" class="form-label">Father's Qualification (बुबाको योग्यता) <span class="text-danger">*</span></label>
                            <input type="text" name="father_qualification" id="father_qualification" class="form-control" value="{{ old("father_qualification") }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="mother_qualification" class="form-label">Mother's Qualification (आमाको योग्यता) <span class="text-danger">*</span></label>
                            <input type="text" name="mother_qualification" id="mother_qualification" class="form-control" value="{{ old("mother_qualification") }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="blood_group" class="form-label">Blood Group <span class="text-danger">*</span></label>
                            <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{ old('blood_group') }}" required>
                        </div>
                    
                        <div class="col-md-4">
                            <label for="nationality" class="form-label">Nationality <span class="text-danger">*</span></label>
                            <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="noc_employee" class="form-label">Are you NOC Employee? <span class="text-danger">*</span></label>
                            <select name="noc_employee" id="noc_employee" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="yes" {{ old('noc_employee') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('noc_employee') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <label for="noc_id_card" class="form-label">NOC ID Card</label>
                            <input type="file" name="noc_id_card" id="noc_id_card"
                                class="form-control" accept="image/*,application/pdf">

                            <small class="text-muted d-block">Max size: 10MB</small>
                        </div>

                        

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>


                {{-- STEP 2: General Info --}}
                <div class="step d-none" id="step2">
                    <h5 class="mb-4 text-primary">Step 2 — General Information</h5>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="religion" class="form-label">Religion <span class="text-danger">*</span> <small>(धर्म)</small></label>
                            <select name="religion" id="religion" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu / हिन्दू</option>
                                <option value="Buddhist" {{ old('religion') == 'Buddhist' ? 'selected' : '' }}>Buddhist / बौद्ध</option>
                                <option value="Christian" {{ old('religion') == 'Christian' ? 'selected' : '' }}>Christian / ख्रीष्टिय</option>
                                <option value="Muslim" {{ old('religion') == 'Muslim' ? 'selected' : '' }}>Muslim / मुस्लिम</option>
                                <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other / अन्य</option>
                            </select>
                            <input type="text" name="religion_other" id="religion_other" class="form-control mt-2 d-none" placeholder="If other, specify" value="{{ old('religion_other') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="community" class="form-label">Community <span class="text-danger">*</span> <small>(तपाई आफैलाई के बोलाउन रुचाउनुहुन्छ)</small></label>
                            <select name="community" id="community" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Male" {{ old('community') == 'Male' ? 'selected' : '' }}>पुरुष</option>
                                <option value="Female" {{ old('community') == 'Female' ? 'selected' : '' }}>महिला</option>
                                <option value="LGBTQ" {{ old('community') == 'LGBTQ' ? 'selected' : '' }}>LGBTQ+</option>
                                <option value="Other" {{ old('community') == 'Other' ? 'selected' : '' }}>Other / अन्य</option>
                            </select>
                            <input type="text" name="community_other" id="community_other" class="form-control mt-2 d-none" placeholder="If other, specify" value="{{ old('community_other') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="ethnic_group" class="form-label">Ethnic Group <span class="text-danger">*</span> <small>(जातीय समूह)</small></label>
                            <select name="ethnic_group" id="ethnic_group" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Dalit" {{ old('ethnic_group') == 'Dalit' ? 'selected' : '' }}>Dalit</option>
                                <option value="Janajati" {{ old('ethnic_group') == 'Janajati' ? 'selected' : '' }}>Janajati</option>
                                <option value="Madhesi" {{ old('ethnic_group') == 'Madhesi' ? 'selected' : '' }}>Madhesi</option>
                                <option value="Brahmin/Chhetri" {{ old('ethnic_group') == 'Brahmin/Chhetri' ? 'selected' : '' }}>Brahmin / Chhetri</option>
                                <option value="Other" {{ old('ethnic_group') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <input type="text" name="ethnic_group_other" id="ethnic_group_other" class="form-control mt-2 d-none" placeholder="If other, specify" value="{{ old('ethnic_group_other') }}">
                        </div>
                         <div class="col-md-6">
                            <label for="ethnic_certificate" class="form-label">Ethnic Certificate</label>
                            <input type="file" name="ethnic_certificate" id="ethnic_certificate" class="form-control" accept="image/*,application/pdf" multiple>
                            <small class="text-muted">Max size: 10MB</small>
                        </div>
                        <div class="col-md-6">
                            <label for="mother_tongue" class="form-label">Mother Tongue <span class="text-danger">*</span> <small>(मातृभाषा)</small></label>
                            <input type="text" name="mother_tongue" id="mother_tongue" class="form-control" value="{{ old('mother_tongue') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="employment_status" class="form-label">Employment Status <span class="text-danger">*</span> <small>(रोजगार स्थिति)</small></label>
                            <select name="employment_status" id="employment_status" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="employed" {{ old('employment_status') == 'Employed' ? 'selected' : '' }}>Employed</option>
                                <option value="unemployed" {{ old('employment_status') == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                            </select>
                        </div>
                         <div class="col-md-4">
                            <label for="physical_disability" class="form-label">Physical Disability <span class="text-danger">*</span> <small>(कुनै पनि असक्षमता?)</small></label>
                            <select name="physical_disability" id="physical_disability" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="yes" {{ old('physical_disability') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('physical_disability') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                         <div class="col-md-6">
                            <label for="disability_certificate" class="form-label">Disability Certificate (If Any)</label>
                            <input type="file" name="disability_certificate" id="disability_certificate"
                                class="form-control" accept="image/*,application/pdf">

                            <small class="text-muted d-block">Max size: 10MB</small>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <!-- STEP 3: Permanent Address -->
                <div class="step d-none" id="step3">
                    <h5 class="mb-4 text-primary">Step 3 — Permanent Address</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="permanent_province" class="form-label">Province <span class="text-danger">*</span></label>
                            <select name="permanent_province" id="permanent_province" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Koshi" {{ old('permanent_province') == 'Koshi' ? 'selected' : '' }}>Koshi</option>
                                <option value="Madhesh" {{ old('permanent_province') == 'Madhesh' ? 'selected' : '' }}>Madhesh</option>
                                <option value="Bagmati" {{ old('permanent_province') == 'Bagmati' ? 'selected' : '' }}>Bagmati</option>
                                <option value="Gandaki" {{ old('permanent_province') == 'Gandaki' ? 'selected' : '' }}>Gandaki</option>
                                <option value="Lumbini" {{ old('permanent_province') == 'Lumbini' ? 'selected' : '' }}>Lumbini</option>
                                <option value="Karnali" {{ old('permanent_province') == 'Karnali' ? 'selected' : '' }}>Karnali</option>
                                <option value="Sudurpashchim" {{ old('permanent_province') == 'Sudurpashchim' ? 'selected' : '' }}>Sudurpashchim</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="permanent_district" class="form-label">District <span class="text-danger">*</span></label>
                            <input type="text" name="permanent_district" id="permanent_district" class="form-control" value="{{ old('permanent_district') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="permanent_municipality" class="form-label">Municipality <span class="text-danger">*</span></label>
                            <input type="text" name="permanent_municipality" id="permanent_municipality" class="form-control" value="{{ old('permanent_municipality') }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="permanent_ward" class="form-label">Ward No. <span class="text-danger">*</span></label>
                            <input type="text" name="permanent_ward" id="permanent_ward" class="form-control" value="{{ old('permanent_ward') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="permanent_tole" class="form-label">Tole</label>
                            <input type="text" name="permanent_tole" id="permanent_tole" class="form-control" value="{{ old('permanent_tole') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="permanent_house_number" class="form-label">House Number</label>
                            <input type="text" name="permanent_house_number" id="permanent_house_number" class="form-control" value="{{ old('permanent_house_number') }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <!-- STEP 4: Mailing Address -->
                <div class="step d-none" id="step4">
                    <h5 class="mb-4 text-primary">Step 4 — Mailing Address</h5>
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="same_as_permanent" {{ old('same_as_permanent') ? 'checked' : '' }}>
                        <label class="form-check-label" for="same_as_permanent">Same as Permanent Address</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="mailing_province" class="form-label">Province <span class="text-danger">*</span></label>
                            <select name="mailing_province" id="mailing_province" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Koshi" {{ old('mailing_province') == 'Koshi' ? 'selected' : '' }}>Koshi</option>
                                <option value="Madhesh" {{ old('mailing_province') == 'Madhesh' ? 'selected' : '' }}>Madhesh</option>
                                <option value="Bagmati" {{ old('mailing_province') == 'Bagmati' ? 'selected' : '' }}>Bagmati</option>
                                <option value="Gandaki" {{ old('mailing_province') == 'Gandaki' ? 'selected' : '' }}>Gandaki</option>
                                <option value="Lumbini" {{ old('mailing_province') == 'Lumbini' ? 'selected' : '' }}>Lumbini</option>
                                <option value="Karnali" {{ old('mailing_province') == 'Karnali' ? 'selected' : '' }}>Karnali</option>
                                <option value="Sudurpashchim" {{ old('mailing_province') == 'Sudurpashchim' ? 'selected' : '' }}>Sudurpashchim</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="mailing_district" class="form-label">District <span class="text-danger">*</span></label>
                            <input type="text" name="mailing_district" id="mailing_district" class="form-control" value="{{ old('mailing_district') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="mailing_municipality" class="form-label">Municipality <span class="text-danger">*</span></label>
                            <input type="text" name="mailing_municipality" id="mailing_municipality" class="form-control" value="{{ old('mailing_municipality') }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="mailing_ward" class="form-label">Ward No. <span class="text-danger">*</span></label>
                            <input type="text" name="mailing_ward" id="mailing_ward" class="form-control" value="{{ old('mailing_ward') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="mailing_tole" class="form-label">Tole</label>
                            <input type="text" name="mailing_tole" id="mailing_tole" class="form-control" value="{{ old('mailing_tole') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="mailing_house_number" class="form-label">House Number</label>
                            <input type="text" name="mailing_house_number" id="mailing_house_number" class="form-control" value="{{ old('mailing_house_number') }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <!-- STEP 5, 6, 7 -->
                <div class="step d-none" id="step5">
                    <h5 class="mb-4 text-primary">Step 5 — Educational Background</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="education_level" class="form-label">Highest Education Level <span class="text-danger">*</span></label>
                            <select name="education_level" id="education_level" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Under SLC" {{ old('education_level') == 'Under SLC' ? 'selected' : '' }}>Under SLC</option>
                                <option value="SLC/SEE" {{ old('education_level') == 'SLC/SEE' ? 'selected' : '' }}>SLC/SEE</option>
                                <option value="+2/Intermediate" {{ old('education_level') == '+2/Intermediate' ? 'selected' : '' }}>+2/Intermediate</option>
                                <option value="Bachelor" {{ old('education_level') == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
                                <option value="Master" {{ old('education_level') == 'Master' ? 'selected' : '' }}>Master</option>
                                <option value="PhD" {{ old('education_level') == 'PhD' ? 'selected' : '' }}>PhD</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="field_of_study" class="form-label">Field of Study</label>
                            <input type="text" name="field_of_study" id="field_of_study" class="form-control" value="{{ old('field_of_study') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="institution_name" class="form-label">Institution Name</label>
                            <input type="text" name="institution_name" id="institution_name" class="form-control" value="{{ old('institution_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="graduation_year" class="form-label">Graduation Year</label>
                            <input type="number" name="graduation_year" id="graduation_year" class="form-control" min="1950" max="2030" value="{{ old('graduation_year') }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <div class="step d-none" id="step6">
                    <h5 class="mb-4 text-primary">Step 6 — Work Experience</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="has_work_experience" class="form-label">Do you have work experience? <span class="text-danger">*</span></label>
                            <select name="has_work_experience" id="has_work_experience" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Yes" {{ old('has_work_experience') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('has_work_experience') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="years_of_experience" class="form-label">Years of Experience</label>
                            <input type="number" name="years_of_experience" id="years_of_experience" class="form-control" min="0" step="0.5" value="{{ old('years_of_experience') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="previous_organization" class="form-label">Previous Organization</label>
                            <input type="text" name="previous_organization" id="previous_organization" class="form-control" value="{{ old('previous_organization') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="previous_position" class="form-label">Previous Position</label>
                            <input type="text" name="previous_position" id="previous_position" class="form-control" value="{{ old('previous_position') }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <div class="step d-none" id="step7">
                    <h5 class="mb-4 text-primary">Step 7 — Upload Documents</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="passport_size_photo" class="form-label">Passport Size Photo <span class="text-danger">*</span></label>
                            <input type="file" name="passport_size_photo" id="passport_size_photo" class="form-control" accept="image/*,application/pdf" required>
                            <small class="text-muted d-block">Max size: 10MB</small>
                        </div>

                        <div class="col-md-6">
                            <label for="citizenship_id_document" class="form-label">Citizenship/ID Document<span class="text-danger">*</span></label>
                            <input type="file" name="citizenship_id_document" id="citizenship_id_document" class="form-control" accept="image/*,application/pdf" required>
                            <small class="text-muted d-block">Max size: 10MB</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="resume_cv" class="form-label">Resume/CV<span class="text-danger">*</span></label>
                            <input type="file" name="resume_cv" id="resume_cv" class="form-control" accept="image/*,application/pdf" required>
                            <small class="text-muted d-block">Max size: 10MB</small>
                        </div>
                        <div class="col-md-6">
                            <label for="educational_certificates" class="form-label">
                                Educational Certificates <span class="text-danger">*</span>
                            </label>

                            <input type="file"
                                name="educational_certificates[]"
                                id="educational_certificates"
                                class="form-control"
                                accept="image/*,application/pdf"
                                multiple
                                required>

                            <small class="text-muted d-block">Max size: 10MB (multiple allowed)</small>
                        </div>

                    </div>
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="terms_agree" name="terms_agree" required>
                        <label class="form-check-label" for="terms_agree">
                            I hereby declare that all information provided is true and correct. <span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn">Back</button>
                        <button type="submit" class="btn btn-success">Submit Application</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .is-invalid { border-color: #dc3545 !important; box-shadow: 0 0 0 0.2rem rgba(220,53,69,0.25) !important; }
    .invalid-feedback { display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; }
</style>
<style>
    /* THIS SINGLE RULE FIXES YOUR ENTIRE PROBLEM */
    .step.d-none {
        visibility: hidden !important;
        height: 1px !important;
        overflow: hidden !important;
        position: absolute !important;
        left: -9999px !important;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentStep = 1;
    const totalSteps = 7;

    function showStep(step) {
        document.querySelectorAll('.step').forEach(s => s.classList.add('d-none'));
        const el = document.getElementById('step' + step);
        if (el) el.classList.remove('d-none');

        const percent = Math.round((step / totalSteps) * 100);
        const bar = document.getElementById('progressBar');
        bar.style.width = percent + '%';
        bar.innerText = `Step ${step} of ${totalSteps}`;

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateStep(step) {
        const stepEl = document.getElementById('step' + step);
        if (!stepEl) return false;

        stepEl.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        stepEl.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

        let isValid = true;
        let firstInvalid = null;

        stepEl.querySelectorAll('input[required], select[required]').forEach(field => {
            if (field.classList.contains('d-none') || field.closest('.d-none')) return;
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
                const err = document.createElement('div');
                err.className = 'invalid-feedback';
                err.textContent = 'This field is required';
                field.parentNode.appendChild(err);
                if (!firstInvalid) firstInvalid = field;
            }
        });

        if (!isValid && firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
        return isValid;
    }

    document.querySelectorAll('.next-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (validateStep(currentStep) && currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    document.querySelectorAll('.prev-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Other field toggles
    ['religion', 'community', 'ethnic_group'].forEach(id => {
        const select = document.getElementById(id);
        const other = document.getElementById(id + '_other');
        if (select && other) {
            select.addEventListener('change', () => {
                other.classList.toggle('d-none', select.value !== 'Other');
                if (select.value !== 'Other') other.value = '';
            });
            if (select.value === 'Other') other.classList.remove('d-none');
        }
    });

    // Same as permanent address
    document.getElementById('same_as_permanent')?.addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('mailing_province').value = document.getElementById('permanent_province').value || '';
            document.getElementById('mailing_district').value = document.getElementById('permanent_district').value || '';
            document.getElementById('mailing_municipality').value = document.getElementById('permanent_municipality').value || '';
            document.getElementById('mailing_ward').value = document.getElementById('permanent_ward').value || '';
            document.getElementById('mailing_tole').value = document.getElementById('permanent_tole').value || '';
            document.getElementById('mailing_house_number').value = document.getElementById('permanent_house_number').value || '';
        }
    });
    showStep(1);
});
</script>
@endpush
@endsection