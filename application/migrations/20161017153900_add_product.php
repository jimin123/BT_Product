<?php
    /**
    * 
    */
    class Migration_add_product  extends CI_Migration
    {
        
        public function __construct()
        {
            parent :: __construct();
        }

        public function up()
        {
            $this->dbforge->add_field(array(
                'product_id' => array(
                                'type'           => 'INT',
                                'constraint'     => 11,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE),
                'name'       => array(
                                'type'           => 'VARCHAR',
                                'constraint'     => 100),
                'catalog_id' => array(
                                'type'           => 'INT',
                                'constraint'     => 11),
                'price'      => array(
                                'type'           => 'DECIMAL',
                                'constraint'     => 15,4),
                'image_link' => array(
                                'type'           => 'VARCHAR',
                                'constraint'     => 50),
                'image_list' => array(
                                'type'           => 'TEXT',
                                'constraint'     => '')
                    )

                );  
            $this->dbforge->add_key('product_id', TRUE);
            $this->dbforge->create_table('tbl_product');
        }

        public function down()
        {
            $this->dbforge->drop_table('tbl_product');
        }

    }
    
?>