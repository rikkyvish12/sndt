@extends('admin.layout')

@section('content')
<style>
    .detail-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
        margin-bottom: 20px;
    }
    .detail-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    .detail-value {
        font-size: 1.1rem;
        color: #2c3e50;
    }
    .question-display {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a237e;
        line-height: 1.4;
    }
    .answer-display {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #1a237e;
        white-space: pre-line;
        line-height: 1.8;
    }
    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .status-active {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
    }
    .status-inactive {
        background: linear-gradient(135deg, #cb2d3e 0%, #ef473a 100%);
        color: white;
    }
</style>

<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1"><i class="material-icons">visibility</i> FAQ Details</h2>
            <p class="text-muted mb-0"><i class="material-icons" style="font-size: 16px;">business</i> {{ $department->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.departments.faqs.edit', [$department->id, $faq->id]) }}" 
               class="btn btn-warning">
                <i class="material-icons">edit</i> Edit
            </a>
            <a href="{{ route('admin.departments.faqs.index', $department->id) }}" 
               class="btn btn-outline-dark">
                <i class="material-icons">arrow_back</i> Back to FAQs
            </a>
        </div>
    </div>

    <!-- FAQ Details -->
    <div class="detail-card">
        <!-- Question -->
        <div class="mb-4">
            <div class="detail-label">
                <i class="material-icons" style="font-size: 16px;">help</i> Question
            </div>
            <div class="question-display">{{ $faq->question }}</div>
        </div>

        <!-- Answer -->
        <div class="mb-4">
            <div class="detail-label">
                <i class="material-icons" style="font-size: 16px;">format_list_bulleted</i> Answer
            </div>
            <div class="answer-display">{{ $faq->answer }}</div>
        </div>

        <!-- Meta Information -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="detail-label">
                    <i class="material-icons" style="font-size: 16px;">category</i> Category
                </div>
                <div class="detail-value">
                    <span class="badge bg-primary">{{ ucfirst($faq->category) }}</span>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="detail-label">
                    <i class="material-icons" style="font-size: 16px;">swap_vert</i> Order
                </div>
                <div class="detail-value">{{ $faq->order }}</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="detail-label">
                    <i class="material-icons" style="font-size: 16px;">info</i> Status
                </div>
                <div>
                    @if($faq->is_active)
                        <span class="status-badge status-active">
                            <i class="material-icons" style="font-size: 18px;">check_circle</i> Active
                        </span>
                    @else
                        <span class="status-badge status-inactive">
                            <i class="material-icons" style="font-size: 18px;">cancel</i> Inactive
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="d-flex gap-2 pt-3 border-top">
            <form action="{{ route('admin.departments.faqs.destroy', [$department->id, $faq->id]) }}" 
                  method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="material-icons">delete</i> Delete FAQ
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
