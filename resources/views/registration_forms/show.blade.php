@extends('layouts.app')

@section('title', 'View Registration')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Employee Application Details</h4>
            <div>
                <a href="{{ route('registration-forms.edit', $registrationForm->id) }}" class="btn btn-warning btn-sm me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('registration-forms.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card-body">
            {{-- SECTION 1: Personal Information --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-user"></i> Personal Information
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Full Name:</strong>
                        <p class="mb-0">{{ $registrationForm->name ?? '-' }}</p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <strong>Birth Date (A.D):</strong>
                        <p class="mb-0">
                            @if($registrationForm->birth_date_ad)
                                {{ is_string($registrationForm->birth_date_ad) ? \Carbon\Carbon::parse($registrationForm->birth_date_ad)->format('F d, Y') : $registrationForm->birth_date_ad->format('F d, Y') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <strong>Birth Date (B.S):</strong>
                        <p class="mb-0">{{ $registrationForm->birth_date_bs ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Age:</strong>
                        <p class="mb-0">{{ $registrationForm->age ?? '-' }} {{ $registrationForm->age ? 'years' : '' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Phone:</strong>
                        <p class="mb-0">{{ $registrationForm->phone ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Gender:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->gender ?? '-') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Marital Status:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->marital_status ?? '-') }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Spouse Name:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->spouse_name_english ?? '-') }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Spouse Nationality:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->spouse_nationality ?? '-') }}</p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Blood Group:</strong>
                        <p class="mb-0">{{ $registrationForm->blood_group ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Nationality:</strong>
                        <p class="mb-0">{{ $registrationForm->nationality ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Citizenship Information --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-id-card"></i> Citizenship Information
                </h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Citizenship Number:</strong>
                        <p class="mb-0">{{ $registrationForm->citizenship_number ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Citizenship Issue Date (B.S):</strong>
                        <p class="mb-0">
                            @if($registrationForm->citizenship_issue_date_bs)
                                {{ is_string($registrationForm->citizenship_issue_date_bs) ? \Carbon\Carbon::parse($registrationForm->citizenship_issue_date_bs)->format('F d, Y') : $registrationForm->citizenship_issue_date_bs->format('F d, Y') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Citizenship Issue District:</strong>
                        <p class="mb-0">{{ $registrationForm->citizenship_issue_district ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Family Information --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-users"></i> Family Information
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Father Name:</strong>
                        <p class="mb-0">{{ $registrationForm->father_name_english ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Father's Qualification:</strong>
                        <p class="mb-0">{{ $registrationForm->father_qualification ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Mother Name:</strong>
                        <p class="mb-0">{{ $registrationForm->mother_name_english ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Mother's Qualification:</strong>
                        <p class="mb-0">{{ $registrationForm->mother_qualification ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Parents's Qualification:</strong>
                        <p class="mb-0">{{ $registrationForm->parent_qualification ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Grandfather Name:</strong>
                        <p class="mb-0">{{ $registrationForm->grandfather_name_english ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 4: General Information --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-info-circle"></i> General Information
                </h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Religion:</strong>
                        <p class="mb-0">
                            {{ $registrationForm->religion ?? '-' }}
                            @if($registrationForm->religion === 'Other' && $registrationForm->religion_other)
                                ({{ $registrationForm->religion_other }})
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Community:</strong>
                        <p class="mb-0">
                            {{ $registrationForm->community ?? '-' }}
                            @if($registrationForm->community === 'Other' && $registrationForm->community_other)
                                ({{ $registrationForm->community_other }})
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Ethnic Group:</strong>
                        <p class="mb-0">
                            {{ $registrationForm->ethnic_group ?? '-' }}
                            @if($registrationForm->ethnic_group === 'Other' && $registrationForm->ethnic_group_other)
                                ({{ $registrationForm->ethnic_group_other }})
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Mother Tongue:</strong>
                        <p class="mb-0">{{ $registrationForm->mother_tongue ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Employment Status:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->employment_status ?? '-') }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Other Employment Details:</strong>
                        <p class="mb-0">{{ $registrationForm->employment_other ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Physical Disability:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->physical_disability ?? '-') }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Disability Details:</strong>
                        <p class="mb-0">{{ $registrationForm->disability_other ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>NOC Employee:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->noc_employee ?? '-') }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 5: Permanent Address --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-home"></i> Permanent Address
                </h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Province:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_province ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>District:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_district ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Municipality:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_municipality ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Ward No.:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_ward ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Tole:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_tole ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>House Number:</strong>
                        <p class="mb-0">{{ $registrationForm->permanent_house_number ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 6: Mailing Address --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-envelope"></i> Mailing/Current Address
                </h5>
                @if($registrationForm->same_as_permanent)
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Same as Permanent Address
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Province:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_province ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>District:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_district ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Municipality:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_municipality ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Ward No.:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_ward ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Tole:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_tole ?? '-' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>House Number:</strong>
                        <p class="mb-0">{{ $registrationForm->mailing_house_number ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 7: Educational Background --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-graduation-cap"></i> Educational Background
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Highest Education Level:</strong>
                        <p class="mb-0">{{ $registrationForm->education_level ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Field of Study:</strong>
                        <p class="mb-0">{{ $registrationForm->field_of_study ?? '-' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Institution Name:</strong>
                        <p class="mb-0">{{ $registrationForm->institution_name ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Graduation Year:</strong>
                        <p class="mb-0">{{ $registrationForm->graduation_year ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 8: Work Experience --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-briefcase"></i> Work Experience
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Has Work Experience:</strong>
                        <p class="mb-0">{{ ucfirst($registrationForm->has_experience ?? '-') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Years of Experience:</strong>
                        <p class="mb-0">{{ $registrationForm->years_of_experience ?? '-' }} {{ $registrationForm->years_of_experience ? 'years' : '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Previous Organization:</strong>
                        <p class="mb-0">{{ $registrationForm->previous_organization ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Previous Position:</strong>
                        <p class="mb-0">{{ $registrationForm->previous_position ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 9: Uploaded Documents --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-file-upload"></i> Uploaded Documents
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Passport Size Photo:</strong>
                        <p class="mb-0">
                            @if($registrationForm->passport_size_photo)
                                <a href="{{ asset('storage/' . $registrationForm->passport_size_photo) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-image"></i> View Photo
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Citizenship/ID Document:</strong>
                        <p class="mb-0">
                            @if($registrationForm->citizenship_id_document)
                                <a href="{{ asset('storage/' . $registrationForm->citizenship_id_document) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-file-pdf"></i> View Document
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Resume/CV:</strong>
                        <p class="mb-0">
                            @if($registrationForm->resume_cv)
                                <a href="{{ asset('storage/' . $registrationForm->resume_cv) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-file-alt"></i> View Resume
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Educational Certificates:</strong>
                        <p class="mb-0">
                            @if($registrationForm->educational_certificates)
                                @php
                                    $certificates = is_string($registrationForm->educational_certificates) 
                                        ? json_decode($registrationForm->educational_certificates, true) 
                                        : $registrationForm->educational_certificates;
                                @endphp
                                @if(is_array($certificates) && count($certificates) > 0)
                                    @foreach($certificates as $index => $cert)
                                        <a href="{{ asset('storage/' . $cert) }}" target="_blank" class="btn btn-sm bg-light me-1 mb-1">
                                            <i class="fas fa-certificate"></i> Certificate {{ $index + 1 }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-muted">Not uploaded</span>
                                @endif
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>NOC ID Card:</strong>
                        <p class="mb-0">
                            @if($registrationForm->noc_id_card)
                                <a href="{{ asset('storage/' . $registrationForm->noc_id_card) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-id-card"></i> View NOC ID
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Ethnic Certificate:</strong>
                        <p class="mb-0">
                            @if($registrationForm->ethnic_certificate)
                                <a href="{{ asset('storage/' . $registrationForm->ethnic_certificate) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-certificate"></i> View Certificate
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Disability Certificate:</strong>
                        <p class="mb-0">
                            @if($registrationForm->disability_certificate)
                                <a href="{{ asset('storage/' . $registrationForm->disability_certificate) }}" target="_blank" class="btn btn-sm bg-light">
                                    <i class="fas fa-file"></i> View Certificate
                                </a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- SECTION 10: System Information --}}
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-clock"></i> System Information
                </h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Registration ID:</strong>
                        <p class="mb-0">{{ $registrationForm->id ?? '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Application Status:</strong>
                        <p class="mb-0">
                            @if($registrationForm->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($registrationForm->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($registrationForm->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($registrationForm->status ?? 'Unknown') }}</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Terms Agreed:</strong>
                        <p class="mb-0">
                            @if($registrationForm->terms_agree)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Same as Permanent Address:</strong>
                        <p class="mb-0">
                            @if($registrationForm->same_as_permanent)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Created At:</strong>
                        <p class="mb-0">
                            @if($registrationForm->created_at)
                                {{ is_string($registrationForm->created_at) ? \Carbon\Carbon::parse($registrationForm->created_at)->format('F d, Y h:i A') : $registrationForm->created_at->format('F d, Y h:i A') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Last Updated:</strong>
                        <p class="mb-0">
                            @if($registrationForm->updated_at)
                                {{ is_string($registrationForm->updated_at) ? \Carbon\Carbon::parse($registrationForm->updated_at)->format('F d, Y h:i A') : $registrationForm->updated_at->format('F d, Y h:i A') }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                <a href="{{ route('registration-forms.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
                <div>
                    <a href="{{ route('registration-forms.edit', $registrationForm->id) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit"></i> Edit Registration
                    </a>
                    <form action="{{ route('registration-forms.destroy', $registrationForm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card-body strong {
        color: #495057;
        font-weight: 600;
    }
    .card-body p {
        color: #212529;
        padding: 0.5rem;
        background-color: #f8f9fa;
        border-radius: 0.25rem;
    }
    .border-bottom {
        border-bottom: 2px solid #dee2e6 !important;
    }
</style>
@endpush
@endsection