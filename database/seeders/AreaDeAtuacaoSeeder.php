<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AreaDeAtuacaoSeeder extends Seeder
{
    public function run(): void
    {
        

        $areas = [
            // Tecnologia
            ['area_name' => 'Desenvolvimento de Software', 'area_category' => 'Tecnologia'],
            ['area_name' => 'Infraestrutura de TI', 'area_category' => 'Tecnologia'],
            ['area_name' => 'Segurança da Informação', 'area_category' => 'Tecnologia'],
            ['area_name' => 'Suporte Técnico', 'area_category' => 'Tecnologia'],
            ['area_name' => 'Cloud Computing', 'area_category' => 'Tecnologia'],
            
            // Comércio
            ['area_name' => 'Comércio Varejista', 'area_category' => 'Comércio'],
            ['area_name' => 'Comércio Atacadista', 'area_category' => 'Comércio'],
            ['area_name' => 'E-commerce', 'area_category' => 'Comércio'],
            ['area_name' => 'Importação e Exportação', 'area_category' => 'Comércio'],
            
            // Serviços
            ['area_name' => 'Consultoria Empresarial', 'area_category' => 'Serviços'],
            ['area_name' => 'Marketing Digital', 'area_category' => 'Serviços'],
            ['area_name' => 'Design Gráfico', 'area_category' => 'Serviços'],
            ['area_name' => 'Fotografia e Vídeo', 'area_category' => 'Serviços'],
            ['area_name' => 'Manutenção Predial', 'area_category' => 'Serviços'],
            ['area_name' => 'Limpeza e Conservação', 'area_category' => 'Serviços'],
            ['area_name' => 'Eventos e Festas', 'area_category' => 'Serviços'],
            
            // Alimentação
            ['area_name' => 'Restaurantes', 'area_category' => 'Alimentação'],
            ['area_name' => 'Lanches e Fast Food', 'area_category' => 'Alimentação'],
            ['area_name' => 'Padarias e Confeitarias', 'area_category' => 'Alimentação'],
            ['area_name' => 'Alimentação Saudável', 'area_category' => 'Alimentação'],
            ['area_name' => 'Bebidas e Destilados', 'area_category' => 'Alimentação'],
            
            // Construção
            ['area_name' => 'Construção Civil', 'area_category' => 'Construção'],
            ['area_name' => 'Arquitetura', 'area_category' => 'Construção'],
            ['area_name' => 'Engenharia', 'area_category' => 'Construção'],
            ['area_name' => 'Reformas e Acabamentos', 'area_category' => 'Construção'],
            ['area_name' => 'Materiais de Construção', 'area_category' => 'Construção'],
            
            // Saúde
            ['area_name' => 'Clínicas Médicas', 'area_category' => 'Saúde'],
            ['area_name' => 'Odontologia', 'area_category' => 'Saúde'],
            ['area_name' => 'Psicologia', 'area_category' => 'Saúde'],
            ['area_name' => 'Farmácias', 'area_category' => 'Saúde'],
            ['area_name' => 'Academia e Bem-estar', 'area_category' => 'Saúde'],
            
            // Educação
            ['area_name' => 'Escolas Particulares', 'area_category' => 'Educação'],
            ['area_name' => 'Cursos Livres', 'area_category' => 'Educação'],
            ['area_name' => 'Idiomas', 'area_category' => 'Educação'],
            ['area_name' => 'Treinamentos Corporativos', 'area_category' => 'Educação'],
            ['area_name' => 'Educação Online', 'area_category' => 'Educação'],
            
            // Agronegócio
            ['area_name' => 'Agricultura', 'area_category' => 'Agronegócio'],
            ['area_name' => 'Pecuária', 'area_category' => 'Agronegócio'],
            ['area_name' => 'Agroindústria', 'area_category' => 'Agronegócio'],
            ['area_name' => 'Insumos Agrícolas', 'area_category' => 'Agronegócio'],
            
            // Transporte
            ['area_name' => 'Transporte de Cargas', 'area_category' => 'Transporte'],
            ['area_name' => 'Logística', 'area_category' => 'Transporte'],
            ['area_name' => 'Transporte de Passageiros', 'area_category' => 'Transporte'],
            ['area_name' => 'Entregas e Encomendas', 'area_category' => 'Transporte'],
            ['area_name' => 'Mudanças', 'area_category' => 'Transporte'],
            
            // Indústria
            ['area_name' => 'Indústria Têxtil', 'area_category' => 'Indústria'],
            ['area_name' => 'Indústria Metalúrgica', 'area_category' => 'Indústria'],
            ['area_name' => 'Indústria Química', 'area_category' => 'Indústria'],
            ['area_name' => 'Indústria Plástica', 'area_category' => 'Indústria'],
            ['area_name' => 'Indústria Moveleira', 'area_category' => 'Indústria'],
        ];

        DB::table('area_activities')->insert($areas);
        
        $this->command->info(count($areas) . ' áreas de atuação cadastradas com sucesso!');
    }
}