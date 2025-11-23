<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RealMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds - with real product names from production
     *
     * @return void
     */
    public function run()
    {
        // Real product data from production site
        $products = [
            ['clue' => 'P8801', 'name' => 'P8801'],
            ['clue' => 'P8802', 'name' => 'P8802'],
            ['clue' => 'P8803', 'name' => 'P8803'],
            ['clue' => 'P8804', 'name' => 'P8804'],
            ['clue' => 'P8805', 'name' => 'P8805'],
            ['clue' => 'P8806', 'name' => 'P8806'],
            ['clue' => 'P8807', 'name' => 'P8807'],
            ['clue' => 'P8808', 'name' => 'P8808'],
            ['clue' => 'P8809', 'name' => 'P8809'],
            ['clue' => 'P8810', 'name' => 'P8810'],
            ['clue' => 'P8811', 'name' => 'P8811'],
            ['clue' => 'P8812', 'name' => 'P8812'],
            ['clue' => 'P8813', 'name' => 'P8813'],
            ['clue' => 'P8814', 'name' => 'P8814'],
            ['clue' => 'P8815', 'name' => 'P8815'],
            ['clue' => 'P8816', 'name' => 'P8816'],
            ['clue' => 'P8817', 'name' => 'P8817'],
            ['clue' => 'P8818', 'name' => 'P8818'],
            ['clue' => 'P8819', 'name' => 'P8819'],
            ['clue' => 'P8820', 'name' => 'P8820'],
            ['clue' => 'P8821', 'name' => 'P8821'],
            ['clue' => 'P8822', 'name' => 'P8822'],
            ['clue' => 'P8823', 'name' => 'P8823'],
            ['clue' => 'P8824', 'name' => 'P8824'],
            ['clue' => 'P8825', 'name' => 'P8825'],
            ['clue' => 'P8826', 'name' => 'P8826'],
            ['clue' => 'P8827', 'name' => 'P8827'],
            ['clue' => 'P8828', 'name' => 'P8828'],
            ['clue' => 'P8829', 'name' => 'P8829'],
            ['clue' => 'P8830', 'name' => 'P8830'],
            ['clue' => 'P8831', 'name' => 'P8831'],
            ['clue' => 'P8832', 'name' => 'P8832'],
            ['clue' => 'P8833', 'name' => 'P8833'],
            ['clue' => 'P8834', 'name' => 'P8834'],
            ['clue' => 'P8835', 'name' => 'P8835'],
            ['clue' => 'P8836', 'name' => 'P8836'],
            ['clue' => 'P8837', 'name' => 'P8837'],
            ['clue' => 'P8838', 'name' => 'P8838'],
            ['clue' => 'P8839', 'name' => 'P8839'],
            ['clue' => 'P8904', 'name' => 'P8904'],
            ['clue' => 'PQ', 'name' => 'WHITE CLOUDY'],
            ['clue' => 'PQ', 'name' => 'BLACK GALAXY'],
            ['clue' => 'PQ102', 'name' => 'STATUARIO NUVO'],
            ['clue' => 'PQ131', 'name' => 'SKY GREY'],
            ['clue' => 'PQ133', 'name' => 'SKY GOLD'],
            ['clue' => 'PQ170', 'name' => 'LUCIAN'],
            ['clue' => 'PQ185', 'name' => 'LYON BLACK'],
            ['clue' => 'PQ197', 'name' => 'BLANC GOLD'],
            ['clue' => 'VT0000', 'name' => 'CERVAIOLE'],
            ['clue' => 'VT005BOR', 'name' => 'CALACATTA BORGHINI'],
            ['clue' => 'VT0110', 'name' => 'CALACATTA MAGNIFICO'],
            ['clue' => 'VT0430', 'name' => 'GELOSIA'],
            ['clue' => 'VT0910', 'name' => 'GRAFITE'],
            ['clue' => 'VT0913', 'name' => 'CALACATTA VERDELLO'],
            ['clue' => 'VT1004GIO', 'name' => 'CALACATTA GIOIA'],
            ['clue' => 'VT1008BOR', 'name' => 'CALACATTA BORGHINI'],
            ['clue' => 'VT1008ST', 'name' => 'BIANCO STATUARIO VENATO'],
            ['clue' => 'VT1014ORO', 'name' => 'CALACATTA ORO'],
            ['clue' => 'VT1027GIO', 'name' => 'CALACATTA GIOIA'],
            ['clue' => 'VT1065BOR', 'name' => 'CALACATTA BORGHINI'],
            ['clue' => 'VT1101 ST', 'name' => 'STATUARIO VENTO'],
            ['clue' => 'VT1111', 'name' => 'SUPERBIA'],
            ['clue' => 'VT1201 BOR', 'name' => 'CALACATTA INFINITE'],
            ['clue' => 'VT1202 BOR', 'name' => 'CALACATTA DELICATO'],
            ['clue' => 'VT1206', 'name' => 'MYSTERY'],
            ['clue' => 'VT1211', 'name' => 'CALACATTA FLUENTE'],
            ['clue' => 'VT1212', 'name' => 'CALACATTA PERLA'],
            ['clue' => 'VT1213', 'name' => 'CALACATTA DIAMANTE'],
            ['clue' => 'VT1216', 'name' => 'CALACATTA ARABESCTO'],
            ['clue' => 'VT1223', 'name' => 'ELEGANT BROWN'],
            ['clue' => 'VT1224', 'name' => 'RIVER GRAY'],
            ['clue' => 'VT1301 ORO', 'name' => 'CALACATTA NEVE'],
            ['clue' => 'VT1510', 'name' => 'BIANCO PERLINO'],
            ['clue' => 'VT1511', 'name' => 'FOSSIL PERLINO'],
            ['clue' => 'VT1512', 'name' => 'ASH PERLINO'],
            ['clue' => 'VT1513', 'name' => 'MARRONE PERLINO'],
            ['clue' => 'VT1514', 'name' => 'GRIGIO PERLINO'],
            ['clue' => 'VT200', 'name' => 'BIANCO STELLA'],
            ['clue' => 'VT211', 'name' => 'GRIGIO STELLA'],
            ['clue' => 'VT2203', 'name' => 'FRESCO PERDUTO'],
            ['clue' => 'VT2206', 'name' => 'FRESCO ANTICO'],
            ['clue' => 'VT2207', 'name' => 'FRESCO GLACIALE'],
            ['clue' => 'VT2222', 'name' => 'LUSSURIA'],
            ['clue' => 'VT225', 'name' => 'NERO STELLA'],
            ['clue' => 'VT2333', 'name' => 'LIBERTA'],
            ['clue' => 'VT2339', 'name' => 'RIGOLETTO'],
            ['clue' => 'VT2356', 'name' => 'FRESCO GRANDIOSO'],
            ['clue' => 'VT242', 'name' => 'BIANCO GRANGLIA'],
            ['clue' => 'VT2507', 'name' => 'CALACATTA MOOD'],
            ['clue' => 'VT260', 'name' => 'TRITON'],
            ['clue' => 'VT261', 'name' => 'DARK CIGAR'],
            ['clue' => 'VT263', 'name' => 'SANTORINI'],
            ['clue' => 'VT270', 'name' => 'CHETEAU BLANC'],
            ['clue' => 'VT3001', 'name' => 'PIETRA GREY'],
            ['clue' => 'VT3003', 'name' => 'CALACATTA FANTASY'],
            ['clue' => 'VT3004', 'name' => 'STATUARIETTO GREY'],
            ['clue' => 'VT3006', 'name' => 'VAGLI'],
            ['clue' => 'VT301', 'name' => 'BIANCO COMETA'],
            ['clue' => 'VT305', 'name' => 'WHITE SPONGE'],
            ['clue' => 'VT3239', 'name' => 'VENATO BERNINI'],
            ['clue' => 'VT3333', 'name' => 'ACCIDIA'],
            ['clue' => 'VT345', 'name' => 'BIANCO FIRENZE'],
            ['clue' => 'VT350', 'name' => 'SAHARA BEIGE'],
            ['clue' => 'VT355', 'name' => 'BEIGE SAND'],
            ['clue' => 'VT390', 'name' => 'NAXOS'],
            ['clue' => 'VT392', 'name' => 'MARENGO'],
            ['clue' => 'VT394', 'name' => 'CENIZA'],
            ['clue' => 'VT395', 'name' => 'NOMBRE'],
            ['clue' => 'VT398', 'name' => 'MALTA GREY'],
            ['clue' => 'VT400', 'name' => 'BIANCO ASSOLUTO'],
            ['clue' => 'VT4152', 'name' => 'FRESCO OSCURO'],
            ['clue' => 'VT501', 'name' => 'MONTCLAIR'],
            ['clue' => 'VT502', 'name' => 'STATUARIO IMPERIALE'],
            ['clue' => 'VT507', 'name' => 'ALABASTER'],
            ['clue' => 'VT512', 'name' => 'DOVE WHITE'],
            ['clue' => 'VT516', 'name' => 'WHITE ICE'],
            ['clue' => 'VT521', 'name' => 'UPPER WEST SIDE'],
            ['clue' => 'VT522', 'name' => 'ANCHOR'],
            ['clue' => 'VT524', 'name' => 'BELGIUM BLUE'],
            ['clue' => 'VT530', 'name' => 'ST LAUREN'],
            ['clue' => 'VT531', 'name' => 'SAVANNAH'],
        ];

        // Get all image files from both directories
        $materialPath = public_path('storage/material');
        $aplicacionPath = public_path('storage/aplicacion');

        if (!File::exists($materialPath) || !File::exists($aplicacionPath)) {
            $this->command->error("Image directories not found");
            return;
        }

        $materialImages = collect(File::files($materialPath))
            ->map(fn($file) => $file->getFilename())
            ->filter(fn($filename) => str_ends_with($filename, '.png'))
            ->values()
            ->all();

        $aplicacionImages = collect(File::files($aplicacionPath))
            ->map(fn($file) => $file->getFilename())
            ->filter(fn($filename) => str_ends_with($filename, '.png'))
            ->values()
            ->all();

        $this->command->info("Found " . count($materialImages) . " material images");
        $this->command->info("Found " . count($aplicacionImages) . " aplicacion images");
        $this->command->info("Found " . count($products) . " products from production");

        $details = [
            'Premium quality natural stone',
            'Durable and heat-resistant surface',
            'Low maintenance material',
            'Elegant finish for luxury spaces',
            'Perfect for kitchen and bathroom',
            'Scratch and stain resistant',
            'Timeless beauty and durability',
            'Engineered quartz perfection'
        ];

        $applications = [
            'Countertops',
            'Backsplash',
            'Flooring',
            'Wall Cladding',
            'Vanity Tops',
            'Shower Walls',
            'Fireplace Surround'
        ];

        // Map products to images
        foreach ($products as $index => $product) {
            // Use modulo to cycle through images if we have more products than images
            $materialIndex = $index % count($materialImages);
            $aplicacionIndex = $index % count($aplicacionImages);

            $materialFilename = $materialImages[$materialIndex];
            $aplicacionFilename = $aplicacionImages[$aplicacionIndex];

            DB::table('materials')->insert([
                'clue' => $product['clue'],
                'name' => $product['name'],
                'amount' => rand(0, 100),
                'details' => $details[array_rand($details)],
                'material' => $materialFilename,
                'application' => $aplicacionFilename,
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info("Successfully seeded " . count($products) . " materials with real names!");
    }
}
