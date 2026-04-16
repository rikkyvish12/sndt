<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\DepartmentFaq;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Handle chatbot messages and provide responses
     */
    public function chat(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:500',
            'department_id' => 'nullable|integer',
        ]);

        $userMessage = strtolower(trim($validated['message']));
        $departmentId = $validated['department_id'] ?? null;
        
        $response = $this->getResponse($userMessage, $departmentId);

        return response()->json([
            'success' => true,
            'response' => $response,
        ]);
    }

    /**
     * Get intelligent response based on user message
     */
    private function getResponse($message, $departmentId = null)
    {
        // Log for debugging
        \Log::info('Chatbot Request', [
            'message' => $message,
            'department_id' => $departmentId
        ]);
        
        // First, check if user is asking about a specific department
        $department = $this->findDepartmentInMessage($message);
        
        // If no department in message, use the department context from the page
        if (!$department && $departmentId) {
            $department = Department::find($departmentId);
            \Log::info('Using department from context', ['department' => $department?->name]);
        }
        
        if ($department) {
            \Log::info('Searching department FAQs', [
                'department' => $department->name,
                'faq_count' => $department->faqs->count()
            ]);
            return $this->getDepartmentFaqInfo($department, $message);
        }
        
        \Log::info('No department context, using general response');

        // Courses & Programs - but ask for department specification first
        if ($this->contains($message, ['course', 'program', 'study', 'diploma', 'degree', 'learn', 'curriculum', 'subject'])) {
            return $this->getDepartmentSpecificationRequest();
        }

        // Departments
        if ($this->contains($message, ['department', 'dept', 'branch', 'division'])) {
            return $this->getDepartmentsInfo();
        }

        // Faculty Information
        if ($this->contains($message, ['faculty', 'teacher', 'professor', 'staff', 'lecturer'])) {
            return $this->getFacultyInfo();
        }

        // Admission Process
        if ($this->contains($message, ['admission', 'apply', 'enroll', 'registration', 'entrance', 'eligibility'])) {
            return $this->getAdmissionInfo();
        }

        // Campus Location
        if ($this->contains($message, ['location', 'address', 'where', 'campus', 'reach', 'direction', 'map'])) {
            return $this->getLocationInfo();
        }

        // Fees & Payment
        if ($this->contains($message, ['fee', 'payment', 'cost', 'tuition', 'expense'])) {
            return $this->getFeesInfo();
        }

        // Contact Information
        if ($this->contains($message, ['contact', 'phone', 'email', 'call', 'reach'])) {
            return $this->getContactInfo();
        }

        // Timing & Schedule
        if ($this->contains($message, ['timing', 'schedule', 'time', 'hour', 'open', 'close'])) {
            return $this->getTimingInfo();
        }

        // Facilities
        if ($this->contains($message, ['facility', 'facilities', 'lab', 'library', 'wifi', 'internet', 'canteen'])) {
            return $this->getFacilitiesInfo();
        }

        // Greeting
        if ($this->contains($message, ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'namaste'])) {
            return "Hello! 👋 Welcome to SNDT Polytechnic. How can I assist you today? You can ask me about courses, departments, faculty, admissions, or campus location.";
        }

        // Thanks
        if ($this->contains($message, ['thank', 'thanks', 'thank you'])) {
            return "You're welcome! 😊 If you have any more questions, feel free to ask. We're here to help!";
        }

        // Default response
        return $this->getDefaultResponse();
    }

    /**
     * Get courses information
     */
    private function getCoursesInfo()
    {
        $courses = Course::with('department')->get();
        
        if ($courses->isEmpty()) {
            return "📚 **Courses & Programs**\n\nWe offer various diploma programs. Please visit our campus or contact the admin office for detailed information about available courses.";
        }

        $response = "📚 **Available Courses & Programs:**\n\n";
        $grouped = $courses->groupBy('department.name');
        
        foreach ($grouped as $deptName => $deptCourses) {
            $response .= "**{$deptName}:**\n";
            foreach ($deptCourses as $course) {
                $response .= "• {$course->name}\n";
            }
            $response .= "\n";
        }

        $response .= "\n💡 For more details about any specific course, feel free to ask!";
        
        return $response;
    }

    /**
     * Request user to specify which department they're asking about
     */
    private function getDepartmentSpecificationRequest()
    {
        $departments = Department::where('is_active', true)->get();
        
        if ($departments->isEmpty()) {
            return "Please visit our departments page to see available programs.";
        }

        $response = "I'd be happy to help! Could you please specify which department you're asking about?\n\n";
        $response .= "**Available Departments:**\n\n";
        
        foreach ($departments as $dept) {
            $response .= "• {$dept->name} ({$dept->code})\n";
        }
        
        $response .= "\n💡 **Example:** \"What will I learn in Jewellery?\" or \"Tell me about JDM course\"";
        
        return $response;
    }

    /**
     * Get departments information
     */
    private function getDepartmentsInfo()
    {
        $departments = Department::all();
        
        if ($departments->isEmpty()) {
            return "🏫 **Departments**\n\nWe have multiple departments offering quality education. Contact us for more detailed information.";
        }

        $response = "🏫 **Our Departments:**\n\n";
        
        foreach ($departments as $dept) {
            $response .= "• **{$dept->name}** ({$dept->code})\n";
            if ($dept->description) {
                $response .= "  " . substr($dept->description, 0, 100) . "...\n";
            }
            $response .= "\n";
        }

        $response .= "\n📝 Want to know about courses in a specific department? Just ask!";
        
        return $response;
    }

    /**
     * Get faculty information
     */
    private function getFacultyInfo()
    {
        $facultyCount = Faculty::count();
        
        $response = "👩‍🏫 **Faculty Information**\n\n";
        $response .= "We have a team of **{$facultyCount}+ experienced faculty members** dedicated to providing quality education.\n\n";
        $response .= "Our faculty includes:\n";
        $response .= "• Experienced Professors\n";
        $response .= "• Subject Matter Experts\n";
        $response .= "• Industry Professionals\n";
        $response .= "• Research Scholars\n\n";
        $response .= "💡 All our faculty members are committed to student success and provide personalized attention.\n\n";
        $response .= "For specific faculty information, please visit the respective department pages or contact us.";
        
        return $response;
    }

    /**
     * Get admission information
     */
    private function getAdmissionInfo()
    {
        $response = "📝 **Admission Process**\n\n";
        $response .= "**Eligibility Criteria:**\n";
        $response .= "• Completion of 10th standard (SSC) or equivalent\n";
        $response .= "• Minimum 50% aggregate marks\n";
        $response .= "• Entrance examination (if applicable)\n\n";
        $response .= "**Application Process:**\n";
        $response .= "1️⃣ Fill out the application form\n";
        $response .= "2️⃣ Submit required documents\n";
        $response .= "3️⃣ Appear for entrance test (if required)\n";
        $response .= "4️⃣ Attend counseling session\n";
        $response .= "5️⃣ Complete admission formalities\n\n";
        $response .= "**Required Documents:**\n";
        $response .= "• SSC Marksheet\n";
        $response .= "• Leaving Certificate\n";
        $response .= "• Caste Certificate (if applicable)\n";
        $response .= "• Income Certificate (if applicable)\n";
        $response .= "• Passport-size photographs\n\n";
        $response .= "📞 For admission enquiries, please contact our admission office or submit your details through the form above!";
        
        return $response;
    }

    /**
     * Get location information
     */
    private function getLocationInfo()
    {
        $response = "📍 **Campus Location**\n\n";
        $response .= "**Premila Vithaldas Polytechnic**\n";
        $response .= "SNDT Women's University\n";
        $response .= "Juhu, Vile Parle (West)\n";
        $response .= "Mumbai - 400 056\n\n";
        $response .= "**How to Reach:**\n";
        $response .= "🚂 **By Train:** Nearest station - Vile Parle (Western Line)\n";
        $response .= "🚌 **By Bus:** Juhu Road bus stop\n";
        $response .= "✈️ **By Air:** 15 mins from Domestic Airport\n\n";
        $response .= "**Landmark:** Near Juhu Beach\n\n";
        $response .= "🗺️ You can find us on Google Maps by searching 'Premila Vithaldas Polytechnic, Juhu'";
        
        return $response;
    }

    /**
     * Get fees information
     */
    private function getFeesInfo()
    {
        $response = "💰 **Fee Structure**\n\n";
        $response .= "Our fees are affordable and structured as follows:\n\n";
        $response .= "**Tuition Fees:**\n";
        $response .= "• Varies by course and year\n";
        $response .= "• Government-approved fee structure\n\n";
        $response .= "**Additional Fees:**\n";
        $response .= "• Examination fees\n";
        $response .= "• Laboratory fees\n";
        $response .= "• Library fees\n\n";
        $response .= "**Scholarships Available:**\n";
        $response .= "• Government scholarships\n";
        $response .= "• Merit-based scholarships\n";
        $response .= "• Need-based financial aid\n\n";
        $response .= "📞 For detailed fee structure, please contact the admin office or visit during office hours.";
        
        return $response;
    }

    /**
     * Get contact information
     */
    private function getContactInfo()
    {
        $response = "📞 **Contact Information**\n\n";
        $response .= "**Phone:** +91 22 1234 5678\n";
        $response .= "**Email:** pvpsndt@gmail.com\n\n";
        $response .= "**Office Hours:**\n";
        $response .= "Monday - Friday: 9:00 AM - 5:00 PM\n";
        $response .= "Saturday: 9:00 AM - 1:00 PM\n\n";
        $response .= "**Address:**\n";
        $response .= "Premila Vithaldas Polytechnic\n";
        $response .= "Juhu, Vile Parle (West)\n";
        $response .= "Mumbai - 400 056\n\n";
        $response .= "💬 Feel free to reach out to us anytime!";
        
        return $response;
    }

    /**
     * Get timing information
     */
    private function getTimingInfo()
    {
        $response = "🕐 **College Timings**\n\n";
        $response .= "**Office Hours:**\n";
        $response .= "Monday - Friday: 9:00 AM - 5:00 PM\n";
        $response .= "Saturday: 9:00 AM - 1:00 PM\n";
        $response .= "Sunday: Closed\n\n";
        $response .= "**Class Timings:**\n";
        $response .= "Morning Batch: 8:00 AM - 12:00 PM\n";
        $response .= "Afternoon Batch: 12:30 PM - 4:30 PM\n\n";
        $response .= "**Library Hours:**\n";
        $response .= "Monday - Saturday: 9:00 AM - 6:00 PM\n\n";
        $response .= "📅 The college remains closed on public holidays and declared vacations.";
        
        return $response;
    }

    /**
     * Get facilities information
     */
    private function getFacilitiesInfo()
    {
        $response = "🏛️ **Campus Facilities**\n\n";
        $response .= "We provide excellent facilities including:\n\n";
        $response .= "📚 **Library:** Well-stocked with books, journals, and digital resources\n";
        $response .= "💻 **Computer Labs:** Modern computers with internet access\n";
        $response .= "🔬 **Science Labs:** Fully equipped laboratories\n";
        $response .= "📶 **WiFi Campus:** Free WiFi throughout the campus\n";
        $response .= "🍽️ **Canteen:** Hygienic and affordable food options\n";
        $response .= "🏃 **Sports Facilities:** Indoor and outdoor sports\n";
        $response .= "🎭 **Auditorium:** For events and seminars\n";
        $response .= "🅿️ **Parking:** Two-wheeler and four-wheeler parking\n";
        $response .= "🛡️ **Security:** 24/7 campus security\n\n";
        $response .= "✨ We ensure a safe and conducive learning environment for all students.";
        
        return $response;
    }

    /**
     * Get default response
     */
    private function getDefaultResponse()
    {
        $responses = [
            "I appreciate your question! 🤔 For detailed information, you can ask me about:\n\n📚 Courses & Programs\n🏫 Departments\n👩‍🏫 Faculty Information\n📝 Admission Process\n📍 Campus Location\n💰 Fee Structure\n🕐 College Timings\n🏛️ Facilities\n\nOr feel free to contact us directly!",
            "That's a great question! While I may not have specific details on that topic, I can help you with information about our courses, departments, admissions, faculty, campus location, and facilities. What would you like to know? 😊",
            "I'd love to help you with that! For now, I can provide information about:\n\n• Available courses and programs\n• Different departments\n• Faculty details\n• Admission process\n• Campus location and how to reach\n• Fee structure\n• College timings\n• Campus facilities\n\nPlease ask about any of these topics!"
        ];
        
        return $responses[array_rand($responses)];
    }

    /**
     * Check if message contains any of the keywords
     */
    private function contains($message, $keywords)
    {
        foreach ($keywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }

    /**
     * Find department mentioned in user message
     */
    private function findDepartmentInMessage($message)
    {
        $departments = Department::where('is_active', true)->get();
        
        // First pass: Look for exact department name match (highest priority)
        foreach ($departments as $dept) {
            $deptName = strtolower($dept->name);
            
            // Check if full department name is in the message
            if (strpos($message, $deptName) !== false) {
                return $dept;
            }
        }
        
        // Second pass: Look for department code match
        foreach ($departments as $dept) {
            $deptCode = strtolower($dept->code);
            
            // Check if department code is in the message (with word boundary)
            if (preg_match('/\b' . preg_quote($deptCode, '/') . '\b/i', $message)) {
                return $dept;
            }
        }
        
        // Third pass: Look for unique department keywords
        // Define unique keywords for each department (avoid common words)
        $departmentKeywords = [
            'jewellery' => 'Jewellery',
            'jewelry' => 'Jewellery',
            'computer' => 'Computer',
            'electrical' => 'Electrical',
            'mechanical' => 'Mechanical',
            'business' => 'Business',
            'arts' => 'Arts',
            'humanities' => 'Humanities',
        ];
        
        foreach ($departmentKeywords as $keyword => $deptType) {
            if (stripos($message, $keyword) !== false) {
                // Find the department that matches this keyword
                foreach ($departments as $dept) {
                    if (stripos($dept->name, $deptType) !== false) {
                        return $dept;
                    }
                }
            }
        }
        
        return null;
    }

    /**
     * Get department-specific FAQ information
     */
    private function getDepartmentFaqInfo($department, $message)
    {
        $faqs = $department->faqs;
        
        if ($faqs->isEmpty()) {
            return "Thank you for your interest in {$department->name}. For detailed information about this department, please contact us or visit the department page.";
        }

        // Try to find matching FAQ based on user question
        $matchedFaq = $this->findMatchingFaq($message, $faqs);
        
        if ($matchedFaq) {
            // Return only the answer, not the question
            return $matchedFaq->answer;
        }

        // If no specific match found, provide a helpful response
        return "I don't have specific information about that. Please contact the {$department->name} department for more details.\n\n📧 Email: {$department->email}\n📞 Phone: {$department->phone}";
    }

    /**
     * Detect FAQ category from user message
     */
    private function detectFaqCategory($message)
    {
        $categoryKeywords = [
            'eligibility' => ['eligibility', 'qualification', 'minimum', 'criteria', 'eligible'],
            'admission' => ['admission', 'apply', 'enroll', 'registration', 'entrance', 'how to join'],
            'fees' => ['fee', 'payment', 'cost', 'tuition', 'scholarship', 'loan', 'expense'],
            'career' => ['career', 'job', 'placement', 'salary', 'package', 'business', 'entrepreneur'],
            'course' => ['course name', 'duration', 'seats', 'medium', 'year'],
            'curriculum' => ['learn', 'study', 'subject', 'practical', 'internship', 'training', 'cad'],
            'facilities' => ['facility', 'lab', 'workshop', 'tool', 'equipment', 'computer'],
            'location' => ['location', 'address', 'hostel', 'railway', 'reach', 'where'],
            'contact' => ['contact', 'phone', 'email', 'visit', 'hour', 'timing', 'working'],
            'general' => ['only for girls', 'drawing', 'different', 'why choose', 'special'],
        ];

        foreach ($categoryKeywords as $category => $keywords) {
            if ($this->contains($message, $keywords)) {
                return $category;
            }
        }

        return null;
    }

    /**
     * Find matching FAQ based on user question
     */
    private function findMatchingFaq($message, $faqs)
    {
        // Remove common words from the message
        $stopWords = ['what', 'is', 'the', 'are', 'can', 'you', 'tell', 'me', 'about', 'how', 'to', 'a', 'an', 'in', 'on', 'at', 'for', 'of', 'and', 'or', 'do', 'does', 'will', 'would', 'could', 'should', 'this', 'that', 'these', 'those', 'it'];
        
        $messageWords = explode(' ', $message);
        $messageWords = array_filter($messageWords, function($word) use ($stopWords) {
            return strlen($word) >= 3 && !in_array(strtolower($word), $stopWords);
        });
        
        \Log::info('FAQ Matching', [
            'message' => $message,
            'filtered_words' => array_values($messageWords),
            'total_faqs' => $faqs->count()
        ]);
        
        // Try to find FAQ with most matching words
        $bestMatch = null;
        $maxScore = 0;

        foreach ($faqs as $faq) {
            $question = strtolower($faq->question);
            $score = 0;
            
            // Remove common words from FAQ question
            $questionWords = explode(' ', $question);
            $questionWords = array_filter($questionWords, function($word) use ($stopWords) {
                return strlen($word) >= 3 && !in_array(strtolower($word), $stopWords);
            });
            
            // Check for keyword matches
            foreach ($messageWords as $word) {
                // Check if word appears in the FAQ question
                if (strpos($question, $word) !== false) {
                    $score += 3; // Higher score for exact word match
                }
                
                // Check for partial/similar matches
                foreach ($questionWords as $qWord) {
                    $similarity = similar_text($word, $qWord) / max(strlen($word), strlen($qWord));
                    if ($similarity > 0.7) {
                        $score += 2;
                        break;
                    }
                }
            }
            
            // Bonus score if the message contains key phrases from the question
            $keyPhrases = array_filter($questionWords, function($word) {
                return strlen($word) >= 4;
            });
            
            $matchedPhrases = 0;
            foreach ($keyPhrases as $phrase) {
                if (strpos($message, $phrase) !== false) {
                    $matchedPhrases++;
                }
            }
            
            if (count($keyPhrases) > 0) {
                $score += ($matchedPhrases / count($keyPhrases)) * 10;
            }

            if ($score > $maxScore) {
                $maxScore = $score;
                $bestMatch = $faq;
            }
        }

        // Return match if score is high enough (at least 3 points)
        $result = ($maxScore >= 3) ? $bestMatch : null;
        
        \Log::info('FAQ Match Result', [
            'matched' => $result ? true : false,
            'max_score' => $maxScore,
            'matched_question' => $result?->question
        ]);
        
        return $result;
    }

    /**
     * Format FAQ response
     */
    private function formatFaqResponse($deptName, $categoryFaqs, $category)
    {
        $categoryLabels = [
            'course' => '📚 Course Information',
            'eligibility' => '✅ Eligibility Criteria',
            'admission' => '📝 Admission Process',
            'curriculum' => '📖 Curriculum',
            'facilities' => '🏛️ Facilities',
            'fees' => '💰 Fees & Scholarships',
            'career' => '💼 Career Options',
            'location' => '📍 Location & Hostel',
            'general' => 'ℹ️ General Information',
            'contact' => '📞 Contact Details',
            'social' => '🌐 Social Media',
        ];

        $label = $categoryLabels[$category] ?? ucfirst($category);
        $response = "**{$deptName} - {$label}**\n\n";

        foreach ($categoryFaqs as $faq) {
            $response .= "**Q: {$faq->question}**\n";
            $response .= "{$faq->answer}\n\n";
        }

        $response .= "\n💡 Have more questions? Feel free to ask!";

        return $response;
    }
}
