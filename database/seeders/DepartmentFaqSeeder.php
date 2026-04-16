<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DepartmentFaq;
use Illuminate\Database\Seeder;

class DepartmentFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Jewellery Designing department
        $jewelleryDept = Department::where('code', 'like', '%jewellery%')
            ->orWhere('name', 'like', '%Jewellery%')
            ->first();

        if (!$jewelleryDept) {
            $this->command->info('Jewellery Designing department not found. Skipping FAQ seeding.');
            return;
        }

        $faqs = [
            // Course Information
            ['question' => 'What is the name of the course?', 'answer' => 'Bachelor of Vocation (B. Voc.) in Jewellery Design & Manufacture.', 'category' => 'course', 'order' => 1],
            ['question' => 'What is the duration of the course?', 'answer' => 'The course duration is 3 years, + 2 months internship per year.', 'category' => 'course', 'order' => 2],
            ['question' => 'What is the medium of instruction?', 'answer' => 'The course is conducted in English.', 'category' => 'course', 'order' => 3],
            ['question' => 'How many seats are available?', 'answer' => 'Approximately 30 seats per batch.', 'category' => 'course', 'order' => 4],
            
            // Eligibility & Admission
            ['question' => 'What is the eligibility for admission?', 'answer' => 'Students must have passed 12th (HSC) any stream or equivalent with minimum 35% marks.', 'category' => 'eligibility', 'order' => 5],
            ['question' => 'Is there an entrance exam?', 'answer' => 'Generally, no compulsory CET; admission may be based on academic merit or institute-level process/interview.', 'category' => 'admission', 'order' => 6],
            ['question' => 'Can diploma students take direct admission?', 'answer' => 'Yes, students with a 3-year diploma in jewellery design or NSQF Level certification from recognised institute or equivalent can get lateral entry in 2nd year.', 'category' => 'admission', 'order' => 7],
            ['question' => 'How can I apply for admission?', 'answer' => 'Through the university\'s official admission portal or application process announced yearly. Or can contact directly to institute.\n\nhttps://sndt.digitaluniversity.ac/admission', 'category' => 'admission', 'order' => 8],
            
            // Curriculum
            ['question' => 'What will I learn in this course?', 'answer' => '• Jewellery design concepts\n• Metalwork & manufacturing\n• Gemstones & diamonds\n• CorelDraw\n• Personality Development\n• CAD (Computer-Aided Design)\n• Casting, setting & finishing techniques\n• Market trends & merchandising\n• Hands-on Learning. Real Industry Skills.\n• Master the Art of Jewellery Making & Design.\n• From Sketch to Showcase – Learn Every Step.\n• Create, Cast, Set & Shine.\n• Where Design Meets Technology (CAD).', 'category' => 'curriculum', 'order' => 9],
            ['question' => 'Is practical training included?', 'answer' => 'Yes, the course is skill-based with strong practical training and workshops.', 'category' => 'curriculum', 'order' => 10],
            ['question' => 'Is internship compulsory?', 'answer' => 'Yes, internship is part of the curriculum in the 3-year program.', 'category' => 'curriculum', 'order' => 11],
            
            // Facilities
            ['question' => 'Does the college provide workshop facilities?', 'answer' => 'Yes, students get access to:\n• Well Equipped Jewellery Designing and Manufacturing labs\n• Tools & equipment\n• CAD / CAM labs', 'category' => 'facilities', 'order' => 12],
            ['question' => 'Will I need to buy my own tools?', 'answer' => 'No, the college provides all necessary tools and equipment.', 'category' => 'facilities', 'order' => 13],
            
            // Fees & Scholarships
            ['question' => 'What is the course fee?', 'answer' => 'Fees are decided by the university and may vary yearly (students should check the latest prospectus).\n\nFirst year: ₹ 89,327\nSecond year: ₹ 85,407\nThird year: ₹ 86,907', 'category' => 'fees', 'order' => 14],
            ['question' => 'Are scholarships available?', 'answer' => 'Yes, eligible students can apply for government and institutional scholarships.', 'category' => 'fees', 'order' => 15],
            ['question' => 'Is bank providing loan for paying for this course?', 'answer' => 'Yes, all nationalised banks provide education loans for this course.', 'category' => 'fees', 'order' => 16],
            
            // Career
            ['question' => 'What are the career options after this course?', 'answer' => '• Jewellery Designer\n• CAD Designer\n• Production Manager\n• Gemmologist (with further study)\n• Entrepreneur / Own Jewellery Brand\n• Retail & Merchandising', 'category' => 'career', 'order' => 17],
            ['question' => 'Can I start my own jewellery business after this course?', 'answer' => 'Yes, the course is industry-oriented and supports entrepreneurship.', 'category' => 'career', 'order' => 18],
            ['question' => 'What is the internship package?', 'answer' => 'Rs. 5,000 to 20,000 depending upon skills and industry.', 'category' => 'career', 'order' => 19],
            ['question' => 'What is the placement package?', 'answer' => 'Rs. 15,000 to 40,000 depending upon skills and industry. With 4+ years of experience Rs. 50,000 to 80,000 depending upon skills and industry.', 'category' => 'career', 'order' => 20],
            
            // Campus & Location
            ['question' => 'Where is the course conducted?', 'answer' => 'At SNDT Mumbai Juhu campus.', 'category' => 'location', 'order' => 21],
            ['question' => 'Is hostel facility available?', 'answer' => 'Yes, hostel facilities may be available (subject to availability and merit). For outstation students only.', 'category' => 'location', 'order' => 22],
            ['question' => 'What is the nearest railway station?', 'answer' => 'Santacruz. The 231-bus route operates between Santacruz Station (W) and Juhu Bus Station in Mumbai.', 'category' => 'location', 'order' => 23],
            
            // General
            ['question' => 'Is this course only for girls?', 'answer' => 'Yes, SNDT is a women\'s university, so admissions are for female students only.', 'category' => 'general', 'order' => 24],
            ['question' => 'Do I need drawing skills?', 'answer' => 'Basic drawing skills help, but training is provided from beginner level.', 'category' => 'general', 'order' => 25],
            ['question' => 'Is CAD compulsory?', 'answer' => 'Yes, CAD is an important part of modern jewellery design education. Training is provided from beginner level.', 'category' => 'general', 'order' => 26],
            ['question' => 'What makes this course different from others?', 'answer' => '• Degree qualification (higher value)\n• Broader knowledge + skills – Designing and Manufacturing\n• Better career and higher study options\n• Well Equipped Labs\n• Experienced Staff\n• Beautiful Campus\n• Women Empowerment\n• 100% placement since 1995\n• On-Job Training', 'category' => 'general', 'order' => 27],
            ['question' => 'Why should I choose SNDT for jewellery design?', 'answer' => '• Government-recognized university pioneer in women education\n• First of its kind in Asia\n• Skill-based vocational degree\n• Industry exposure & internship\n• Affordable education', 'category' => 'general', 'order' => 28],
            
            // Contact & Hours
            ['question' => 'What are the working hours?', 'answer' => 'Monday to Friday 8.30 A.M. to 4.30 P.M.', 'category' => 'contact', 'order' => 29],
            ['question' => 'Can I visit the department?', 'answer' => 'Yes, Monday to Friday 8.30 A.M. to 4.30 P.M.', 'category' => 'contact', 'order' => 30],
            ['question' => 'What are the contact details?', 'answer' => 'CENTRE FOR VOCATIONAL AND TECHNICAL EDUCATION\nSNDT WOMENS UNIVERSITY\nP.V. Polytechnic Building, III rd Floor\nJuhu Tara Road Santacruz (West) Mumbai\n\nEmail: hod.jdm@pvp.sndt.ac.in\nMobile: 9821304258', 'category' => 'contact', 'order' => 31],
            
            // Social Media
            ['question' => 'What are the social media links?', 'answer' => 'Facebook: https://www.facebook.com/jewellerydesignpvpsndt/\nInstagram: https://www.instagram.com/jewels_by_sndt/\nYouTube: Jewellery Education- SNDT Womens University', 'category' => 'social', 'order' => 32],
        ];

        foreach ($faqs as $faq) {
            DepartmentFaq::create([
                'department_id' => $jewelleryDept->id,
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'category' => $faq['category'],
                'order' => $faq['order'],
                'is_active' => true,
            ]);
        }

        $this->command->info('Successfully seeded ' . count($faqs) . ' FAQs for Jewellery Designing department!');
    }
}
