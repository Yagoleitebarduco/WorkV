<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected array $skills = [
        // 💻 Desenvolvimento e Tecnologia
        'Desenvolvimento Web' => [
            'Full Stack Development',
            'Front-End Development',
            'Back-End Development',
            'Mobile App Development',
            'API Development & Integration',
            'CMS Development (WordPress)',
            'Ecommerce Website Development',
            'Scripting & Automation',
            'Manual Testing',
            'Firmware Development'
        ],

        // 🤖 Dados e Inteligência Artificial
        'Dados & IA' => [
            'AI Integration',
            'AI Chatbot Development',
            'AI Video Generation & Editing',
            'AI Image Generation & Editing',
            'AI Data Annotation & Labeling',
            'Machine Learning',
            'Deep Learning',
            'Generative AI Modeling',
            'Prompt Engineering',
            'Data Analytics',
            'Data Visualization',
            'Data Engineering',
            'Knowledge Representation'
        ],

        // 🎨 Design e Criativo
        'Design & Criativo' => [
            'Graphic Design',
            'UI/UX Design',
            'Logo Design',
            'Brand Identity Design',
            'Video Editing',
            'Video Production',
            '3D Animation',
            'Illustration',
            'Image Editing',
            'Presentation Design',
            'Product & Industrial Design'
        ],

        // 📢 Marketing e Vendas
        'Marketing & Vendas' => [
            'Social Media Marketing',
            'Social Media Strategy',
            'SEO (Search Engine Optimization)',
            'Email Marketing',
            'Marketing Strategy',
            'Marketing Automation',
            'Lead Generation',
            'Sales & Business Development',
            'Campaign Management',
            'Display Advertising',
            'Brand Strategy',
            'Copywriting & Content Creation'
        ],

        // 📋 Administração e Suporte
        'Administração & Suporte' => [
            'General Virtual Assistance',
            'Executive Virtual Assistance',
            'Data Entry',
            'Digital Project Management',
            'Ecommerce Management',
            'Market Research',
            'General Research Services',
            'Medical Virtual Assistance',
            'Supply Chain & Logistics Management',
            'Manual Transcription'
        ]
    ];

    public function run(): void
    {
        $totalInseridas = 0;

        foreach ($this->skills as $category => $skillNames) {
            foreach ($skillNames as $skillName) {
                DB::table('skils')->insert([
                    'skill_name' => $skillName,
                    'category' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $totalInseridas++;
            }
        }

        $this->command->info("✅ $totalInseridas habilidades foram cadastradas com sucesso!");
        $this->command->table(
            ['Categoria', 'Quantidade'],
            collect($this->skills)->map(fn($items, $cat) => [$cat, count($items)])->toArray()
        );
    }
}
