<?php



/**
 * This class defines the structure of the 'persona_fisica' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PersonaFisicaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.PersonaFisicaTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('persona_fisica');
        $this->setPhpName('PersonaFisica');
        $this->setClassname('PersonaFisica');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID_PERSONA_FISICA', 'IdPersonaFisica', 'INTEGER', true, 10, null);
        $this->addForeignKey('PERSONA_ID', 'PersonaId', 'INTEGER', 'persona', 'ID_PERSONA', true, 10, null);
        $this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 25, null);
        $this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', false, 30, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 20, null);
        $this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 15, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'id_persona', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // PersonaFisicaTableMap
