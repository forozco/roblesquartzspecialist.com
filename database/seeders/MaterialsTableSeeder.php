<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all image files from both directories
        $materialPath = public_path('storage/material');
        $aplicacionPath = public_path('storage/aplicacion');

        if (!File::exists($materialPath)) {
            $this->command->error("Material directory not found at: {$materialPath}");
            return;
        }

        if (!File::exists($aplicacionPath)) {
            $this->command->error("Aplicacion directory not found at: {$aplicacionPath}");
            return;
        }

        $materialImages = File::files($materialPath);
        $aplicacionImages = File::files($aplicacionPath);

        if (empty($materialImages)) {
            $this->command->warn("No images found in material directory");
            return;
        }

        $this->command->info("Found " . count($materialImages) . " material images");
        $this->command->info("Found " . count($aplicacionImages) . " aplicacion images");

        // Material types for variety
        $materialTypes = [
            'Quartz',
            'Granite',
            'Marble',
            'Quartzite',
            'Porcelain',
            'Limestone',
            'Travertine',
            'Soapstone',
            'Slate'
        ];

        // Application types
        $applications = [
            'Countertops',
            'Backsplash',
            'Flooring',
            'Wall Cladding',
            'Vanity Tops',
            'Shower Walls',
            'Fireplace Surround'
        ];

        $details = [
            'Premium quality natural stone',
            'Durable and heat-resistant surface',
            'Low maintenance material',
            'Elegant finish for luxury spaces',
            'Perfect for kitchen and bathroom',
            'Scratch and stain resistant',
            'Timeless beauty and durability'
        ];

        $counter = 1;

        // Convert to arrays and get filenames
        $materialFilenames = array_map(function($file) {
            return $file->getFilename();
        }, $materialImages);

        $aplicacionFilenames = array_map(function($file) {
            return $file->getFilename();
        }, $aplicacionImages);

        // Filter only PNG files
        $materialFilenames = array_filter($materialFilenames, function($filename) {
            return str_ends_with($filename, '.png');
        });

        $aplicacionFilenames = array_filter($aplicacionFilenames, function($filename) {
            return str_ends_with($filename, '.png');
        });

        // Reset array keys
        $materialFilenames = array_values($materialFilenames);
        $aplicacionFilenames = array_values($aplicacionFilenames);

        foreach ($materialFilenames as $index => $materialFilename) {
            // Use corresponding aplicacion image, or same material image if not available
            $aplicacionFilename = isset($aplicacionFilenames[$index]) ? $aplicacionFilenames[$index] : $materialFilename;

            // Generate material data
            $materialType = $materialTypes[array_rand($materialTypes)];
            $clue = 'MAT-' . str_pad($counter, 4, '0', STR_PAD_LEFT);
            $name = $materialType . ' ' . $counter;
            $detail = $details[array_rand($details)];
            $application = $applications[array_rand($applications)];

            DB::table('materials')->insert([
                'clue' => $clue,
                'name' => $name,
                'amount' => rand(0, 100),
                'details' => $detail,
                'material' => $materialFilename,
                'application' => $aplicacionFilename,
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $counter++;
        }

        $this->command->info("Successfully seeded " . ($counter - 1) . " materials!");
    }
}
