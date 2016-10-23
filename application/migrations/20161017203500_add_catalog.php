<?php
    /**
    * 
    */
    class Migration_Add_catalog extends CI_Migration
    {
        
        function __construct()
        {
            parent :: __construct();
        }

        function up()
        {
            $this->dbforge->add_field(array(
                                'catalog_id' => array(
                                            'type'          => 'INT',
                                            'constraint'    => 11,
                                            'unsigned'      => TRUE,
                                            'auto_increment' => TRUE),
                                'name'       => array(
                                            'type'          => 'VARCHAR',
                                            'constraint'    => 70),
                                'parent_id'  => array(
                                            'type'          => 'INT',
                                            'constraint'    => 11),
                                'sort_order' => array(
                                            'type'          => 'INT',
                                            'constraint'    => 0),
                                'active'     => array(
                                            'type'          => 'TINYINT',
                                            'constraint'    => 0)
                                )
            );

            $this->dbforge->add_key('catalog_id', TRUE);
            $this->dbforge->create_table('tbl_catalog');
        }

        function down()
        {
            $this->dbforge->drop_table('tbl_catalog');
        }
    }
?>