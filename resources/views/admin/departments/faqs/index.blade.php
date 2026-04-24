@extends('admin.layout')

@section('content')
<style>
    .faq-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    .faq-card:hover {
        border-left-color: #1a237e;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .category-badge {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .active-badge {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    .inactive-badge {
        background: linear-gradient(135deg, #cb2d3e 0%, #ef473a 100%);
    }
    .action-btn {
        transition: all 0.2s ease;
    }
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
</style>

<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1"><i class="material-icons">quiz</i> Manage FAQs</h2>
            <p class="text-muted mb-0"><i class="material-icons" style="font-size: 16px;">business</i> {{ $department->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.departments.contents.index', $department->id) }}" 
               class="btn btn-outline-secondary">
                <i class="material-icons">description</i> Manage Content
            </a>
            <a href="{{ route('admin.departments.faqs.create', $department->id) }}" 
               class="btn btn-primary">
                <i class="material-icons">add_circle</i> Add New FAQ
            </a>
            <a href="{{ route('admin.departments.index') }}" 
               class="btn btn-outline-dark">
                <i class="material-icons">arrow_back</i> Back
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="material-icons" style="vertical-align: middle;">check_circle</i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Stats Cards -->
    @if(!$faqs->isEmpty())
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Total FAQs</h6>
                                <h2 class="mb-0">{{ $faqs->count() }}</h2>
                            </div>
                            <i class="material-icons" style="font-size: 48px; opacity: 0.3;">quiz</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Active</h6>
                                <h2 class="mb-0">{{ $faqs->where('is_active', true)->count() }}</h2>
                            </div>
                            <i class="material-icons" style="font-size: 48px; opacity: 0.3;">check_circle</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Inactive</h6>
                                <h2 class="mb-0">{{ $faqs->where('is_active', false)->count() }}</h2>
                            </div>
                            <i class="material-icons" style="font-size: 48px; opacity: 0.3;">cancel</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Categories</h6>
                                <h2 class="mb-0">{{ $faqs->unique('category')->count() }}</h2>
                            </div>
                            <i class="material-icons" style="font-size: 48px; opacity: 0.3;">category</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- FAQs List -->
    @if($faqs->isEmpty())
        <div class="card text-center p-5">
            <div class="card-body">
                <i class="material-icons text-muted" style="font-size: 64px;">quiz</i>
                <h3 class="mt-3 text-muted">No FAQs Yet</h3>
                <p class="text-muted mb-4">Start adding FAQs to help users learn about this department.</p>
                <a href="{{ route('admin.departments.faqs.create', $department->id) }}" 
                   class="btn btn-primary btn-lg">
                    <i class="material-icons">add_circle</i> Add Your First FAQ
                </a>
            </div>
        </div>
    @else
        <!-- Group FAQs by Category -->
        @php
            $groupedFaqs = $faqs->groupBy('category');
            $categoryLabels = [
                'general' => 'ℹ️ General Information',
                'course' => '📚 Course Details',
                'eligibility' => '✅ Eligibility',
                'admission' => '📝 Admission Process',
                'curriculum' => '📖 Curriculum & Learning',
                'facilities' => '🏛️ Facilities',
                'fees' => '💰 Fees & Scholarships',
                'career' => '💼 Career Options',
                'location' => '📍 Location & Hostel',
                'contact' => '📞 Contact Details',
                'social' => '🌐 Social Media',
            ];
        @endphp

        @foreach($groupedFaqs as $category => $categoryFaqs)
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <h4 class="mb-0">{{ $categoryLabels[$category] ?? ucfirst($category) }}</h4>
                    <span class="badge category-badge ms-2">{{ $categoryFaqs->count() }} FAQs</span>
                </div>
                
                <div class="accordion" id="accordion-{{ $category }}">
                    @foreach($categoryFaqs as $index => $faq)
                        <div class="accordion-item faq-card mb-2">
                            <h2 class="accordion-header d-flex justify-content-between align-items-center" id="heading-{{ $faq->id }}">
                                <button class="accordion-button collapsed flex-grow-1" type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse-{{ $faq->id }}" 
                                        aria-expanded="false" 
                                        aria-controls="collapse-{{ $faq->id }}">
                                    <div class="d-flex align-items-center w-100">
                                        @if(!$faq->is_active)
                                            <span class="badge inactive-badge me-2">Inactive</span>
                                        @else
                                            <span class="badge active-badge me-2">Active</span>
                                        @endif
                                        <strong>{{ $faq->question }}</strong>
                                    </div>
                                </button>
                                <div class="d-flex gap-1 px-3">
                                    <a href="{{ route('admin.departments.faqs.show', [$department->id, $faq->id]) }}" 
                                       class="btn btn-sm btn-outline-primary action-btn" title="View">
                                        <i class="material-icons" style="font-size: 18px;">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.departments.faqs.edit', [$department->id, $faq->id]) }}" 
                                       class="btn btn-sm btn-outline-warning action-btn" title="Edit">
                                        <i class="material-icons" style="font-size: 18px;">edit</i>
                                    </a>
                                    <form action="{{ route('admin.departments.faqs.destroy', [$department->id, $faq->id]) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger action-btn" title="Delete">
                                            <i class="material-icons" style="font-size: 18px;">delete</i>
                                        </button>
                                    </form>
                                </div>
                            </h2>
                            <div id="collapse-{{ $faq->id }}" 
                                 class="accordion-collapse collapse" 
                                 aria-labelledby="heading-{{ $faq->id }}" 
                                 data-bs-parent="#accordion-{{ $category }}">
                                <div class="accordion-body">
                                    <div class="bg-light p-3 rounded">
                                        <p class="mb-0" style="white-space: pre-line;">{{ $faq->answer }}</p>
                                    </div>
                                    <div class="mt-2 text-muted small">
                                        <i class="material-icons" style="font-size: 14px;">swap_vert</i> Order: {{ $faq->order }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
