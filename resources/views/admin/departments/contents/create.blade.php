@extends('admin.layout')

@section('title', 'Add Content Section')

@section('content')
<div class="page-header">
    <h1><i class="material-icons">add_circle</i> Add Content Section</h1>
    <p class="text-muted">{{ $department->name }} - {{ $department->code }}</p>
</div>

<form action="{{ route('admin.departments.contents.store', $department->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card">
        <div class="card-body">
            <!-- Section Selection -->
            <div class="mb-4">
                <label for="section" class="form-label"><i class="material-icons">label</i> Section *</label>
                <select name="section" id="section" required
                        class="form-select @error('section') is-invalid @enderror">
                    <option value="">Select a section...</option>
                    @foreach($sections as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('section')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dynamic Content Fields Based on Section -->
            <div id="dynamic-fields">
                <!-- Fields will be shown/hidden based on section selection -->
            </div>

            <!-- Order -->
            <div class="mb-4">
                <label for="order" class="form-label"><i class="material-icons">sort</i> Display Order</label>
                <input type="number" name="order" id="order" value="0" min="0"
                       class="form-control @error('order') is-invalid @enderror">
                <small class="text-muted">Lower numbers appear first</small>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input type="checkbox" name="is_active" id="is_active" value="1" checked
                           class="form-check-input">
                    <label for="is_active" class="form-check-label">Active</label>
                </div>
                <small class="text-muted">Inactive sections won't be displayed on the public page</small>
            </div>
        </div>
        
        <div class="card-footer text-end">
            <a href="{{ route('admin.departments.contents.index', $department->id) }}"
               class="btn btn-secondary me-2">
                <i class="material-icons">cancel</i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i> Create Section
            </button>
        </div>
    </div>
</form>

<!-- CKEditor 5 CDN (Free, no API key required) -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
// Initialize CKEditor
function initEditor(selector) {
    document.querySelectorAll(selector).forEach(textarea => {
        ClassicEditor
            .create(textarea, {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
}

// Section field configurations
const sectionFields = {
    'about': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">subject</i> About Content</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        `
    },
    'vision': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">visibility</i> Vision</label>
                <textarea name="content" id="content" rows="8" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">rocket_launch</i> Mission</label>
                <textarea name="extra_data[mission]" id="mission" rows="8" class="form-control rich-text-editor">{{ old('extra_data.mission') }}</textarea>
            </div>
        `
    },
    'po': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">assignment</i> Program Outcomes (PO)</label>
                <textarea name="content" id="content" rows="8" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">psychology</i> Program Specific Outcomes (PSO)</label>
                <textarea name="extra_data[pso]" id="pso" rows="8" class="form-control rich-text-editor">{{ old('extra_data.pso') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">emoji_objects</i> Program Educational Objectives (PEO)</label>
                <textarea name="extra_data[peo]" id="peo" rows="8" class="form-control rich-text-editor">{{ old('extra_data.peo') }}</textarea>
            </div>
        `
    },
    'gallery': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">image</i> Gallery Images</label>
                <small class="text-muted d-block mb-2">Upload multiple images (JPG, PNG, GIF, WebP)</small>
                <input type="file" name="images[]" id="gallery-images" multiple accept="image/*"
                       class="form-control @error('images.*') is-invalid @enderror">
                @error('images.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div id="image-preview" class="mt-3 row g-2"></div>
            </div>
        `
    },
    'events': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">event</i> Events Content</label>
                <textarea name="content" id="content" rows="8" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">photo_library</i> Event Images</label>
                <small class="text-muted d-block mb-2">Upload event images (JPG, PNG, GIF, WebP)</small>
                <input type="file" name="images[]" id="event-images" multiple accept="image/*"
                       class="form-control @error('images.*') is-invalid @enderror">
                <div id="image-preview" class="mt-3 row g-2"></div>
            </div>
        `
    },
    'hod': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">person</i> HOD's Message</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'faculty': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">group</i> Faculty Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'courses': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">school</i> Courses Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'laboratory': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">science</i> Laboratory Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'mou': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">handshake</i> MOU Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'industry': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">business</i> Industry Visits Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'alumnae': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">diversity_3</i> Alumnae Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'committee': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">groups</i> Committee Information</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    },
    'social': {
        html: `
            <div class="mb-4">
                <label class="form-label"><i class="material-icons">share</i> Social/Contact CTA</label>
                <textarea name="content" id="content" rows="10" class="form-control rich-text-editor">{{ old('content') }}</textarea>
            </div>
        `
    }
};

// Handle section change
 document.getElementById('section').addEventListener('change', function() {
    const section = this.value;
    const dynamicFields = document.getElementById('dynamic-fields');
    
    // Clear existing CKEditor instances
    if (window.editors) {
        window.editors.forEach(editor => {
            if (editor) {
                editor.destroy().catch(error => console.error(error));
            }
        });
    }
    window.editors = [];
    
    // Update dynamic fields
    if (sectionFields[section]) {
        dynamicFields.innerHTML = sectionFields[section].html;
        
        // Initialize CKEditor for rich text editors
        setTimeout(() => {
            initEditor('.rich-text-editor');
            
            // Setup image preview if file input exists
            setupImagePreview();
        }, 100);
    } else {
        dynamicFields.innerHTML = '';
    }
});

// Setup image preview
function setupImagePreview() {
    const fileInput = document.querySelector('input[type="file"][multiple]');
    if (!fileInput) return;
    
    fileInput.addEventListener('change', function(e) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';
        
        const files = e.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-3';
                    col.innerHTML = `
                        <div class="position-relative">
                            <img src="${e.target.result}" class="img-thumbnail" style="height: 100px; width: 100%; object-fit: cover;">
                        </div>
                    `;
                    preview.appendChild(col);
                };
                reader.readAsDataURL(file);
            }
        }
    });
}
</script>
@endsection
