<?php


/**
 * Base class that represents a row from the 'localidad' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLocalidad extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'LocalidadPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        LocalidadPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_localidad field.
     * @var        int
     */
    protected $id_localidad;

    /**
     * The value for the nombre_localidad field.
     * @var        string
     */
    protected $nombre_localidad;

    /**
     * The value for the codigo_postal field.
     * @var        string
     */
    protected $codigo_postal;

    /**
     * The value for the provincia_id field.
     * @var        int
     */
    protected $provincia_id;

    /**
     * @var        Provincia
     */
    protected $aProvincia;

    /**
     * @var        PropelObjectCollection|Direccion[] Collection to store aggregation of Direccion objects.
     */
    protected $collDireccions;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $direccionsScheduledForDeletion = null;

    /**
     * Get the [id_localidad] column value.
     * 
     * @return   int
     */
    public function getIdLocalidad()
    {

        return $this->id_localidad;
    }

    /**
     * Get the [nombre_localidad] column value.
     * 
     * @return   string
     */
    public function getNombreLocalidad()
    {

        return $this->nombre_localidad;
    }

    /**
     * Get the [codigo_postal] column value.
     * 
     * @return   string
     */
    public function getCodigoPostal()
    {

        return $this->codigo_postal;
    }

    /**
     * Get the [provincia_id] column value.
     * 
     * @return   int
     */
    public function getProvinciaId()
    {

        return $this->provincia_id;
    }

    /**
     * Set the value of [id_localidad] column.
     * 
     * @param      int $v new value
     * @return   Localidad The current object (for fluent API support)
     */
    public function setIdLocalidad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_localidad !== $v) {
            $this->id_localidad = $v;
            $this->modifiedColumns[] = LocalidadPeer::ID_LOCALIDAD;
        }


        return $this;
    } // setIdLocalidad()

    /**
     * Set the value of [nombre_localidad] column.
     * 
     * @param      string $v new value
     * @return   Localidad The current object (for fluent API support)
     */
    public function setNombreLocalidad($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre_localidad !== $v) {
            $this->nombre_localidad = $v;
            $this->modifiedColumns[] = LocalidadPeer::NOMBRE_LOCALIDAD;
        }


        return $this;
    } // setNombreLocalidad()

    /**
     * Set the value of [codigo_postal] column.
     * 
     * @param      string $v new value
     * @return   Localidad The current object (for fluent API support)
     */
    public function setCodigoPostal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo_postal !== $v) {
            $this->codigo_postal = $v;
            $this->modifiedColumns[] = LocalidadPeer::CODIGO_POSTAL;
        }


        return $this;
    } // setCodigoPostal()

    /**
     * Set the value of [provincia_id] column.
     * 
     * @param      int $v new value
     * @return   Localidad The current object (for fluent API support)
     */
    public function setProvinciaId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->provincia_id !== $v) {
            $this->provincia_id = $v;
            $this->modifiedColumns[] = LocalidadPeer::PROVINCIA_ID;
        }

        if ($this->aProvincia !== null && $this->aProvincia->getIdProvincia() !== $v) {
            $this->aProvincia = null;
        }


        return $this;
    } // setProvinciaId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_localidad = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nombre_localidad = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->codigo_postal = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->provincia_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = LocalidadPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Localidad object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aProvincia !== null && $this->provincia_id !== $this->aProvincia->getIdProvincia()) {
            $this->aProvincia = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(LocalidadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = LocalidadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProvincia = null;
            $this->collDireccions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(LocalidadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = LocalidadQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLocalidad:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseLocalidad:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(LocalidadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLocalidad:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseLocalidad:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

                LocalidadPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aProvincia !== null) {
                if ($this->aProvincia->isModified() || $this->aProvincia->isNew()) {
                    $affectedRows += $this->aProvincia->save($con);
                }
                $this->setProvincia($this->aProvincia);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->direccionsScheduledForDeletion !== null) {
                if (!$this->direccionsScheduledForDeletion->isEmpty()) {
                    DireccionQuery::create()
                        ->filterByPrimaryKeys($this->direccionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->direccionsScheduledForDeletion = null;
                }
            }

            if ($this->collDireccions !== null) {
                foreach ($this->collDireccions as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = LocalidadPeer::ID_LOCALIDAD;
        if (null !== $this->id_localidad) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . LocalidadPeer::ID_LOCALIDAD . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(LocalidadPeer::ID_LOCALIDAD)) {
            $modifiedColumns[':p' . $index++]  = '`ID_LOCALIDAD`';
        }
        if ($this->isColumnModified(LocalidadPeer::NOMBRE_LOCALIDAD)) {
            $modifiedColumns[':p' . $index++]  = '`NOMBRE_LOCALIDAD`';
        }
        if ($this->isColumnModified(LocalidadPeer::CODIGO_POSTAL)) {
            $modifiedColumns[':p' . $index++]  = '`CODIGO_POSTAL`';
        }
        if ($this->isColumnModified(LocalidadPeer::PROVINCIA_ID)) {
            $modifiedColumns[':p' . $index++]  = '`PROVINCIA_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `localidad` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID_LOCALIDAD`':
						$stmt->bindValue($identifier, $this->id_localidad, PDO::PARAM_INT);
                        break;
                    case '`NOMBRE_LOCALIDAD`':
						$stmt->bindValue($identifier, $this->nombre_localidad, PDO::PARAM_STR);
                        break;
                    case '`CODIGO_POSTAL`':
						$stmt->bindValue($identifier, $this->codigo_postal, PDO::PARAM_STR);
                        break;
                    case '`PROVINCIA_ID`':
						$stmt->bindValue($identifier, $this->provincia_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
			$pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdLocalidad($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aProvincia !== null) {
                if (!$this->aProvincia->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
                }
            }


            if (($retval = LocalidadPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDireccions !== null) {
                    foreach ($this->collDireccions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = LocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdLocalidad();
                break;
            case 1:
                return $this->getNombreLocalidad();
                break;
            case 2:
                return $this->getCodigoPostal();
                break;
            case 3:
                return $this->getProvinciaId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Localidad'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Localidad'][$this->getPrimaryKey()] = true;
        $keys = LocalidadPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdLocalidad(),
            $keys[1] => $this->getNombreLocalidad(),
            $keys[2] => $this->getCodigoPostal(),
            $keys[3] => $this->getProvinciaId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aProvincia) {
                $result['Provincia'] = $this->aProvincia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDireccions) {
                $result['Direccions'] = $this->collDireccions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = LocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdLocalidad($value);
                break;
            case 1:
                $this->setNombreLocalidad($value);
                break;
            case 2:
                $this->setCodigoPostal($value);
                break;
            case 3:
                $this->setProvinciaId($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = LocalidadPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdLocalidad($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombreLocalidad($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCodigoPostal($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProvinciaId($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LocalidadPeer::DATABASE_NAME);

        if ($this->isColumnModified(LocalidadPeer::ID_LOCALIDAD)) $criteria->add(LocalidadPeer::ID_LOCALIDAD, $this->id_localidad);
        if ($this->isColumnModified(LocalidadPeer::NOMBRE_LOCALIDAD)) $criteria->add(LocalidadPeer::NOMBRE_LOCALIDAD, $this->nombre_localidad);
        if ($this->isColumnModified(LocalidadPeer::CODIGO_POSTAL)) $criteria->add(LocalidadPeer::CODIGO_POSTAL, $this->codigo_postal);
        if ($this->isColumnModified(LocalidadPeer::PROVINCIA_ID)) $criteria->add(LocalidadPeer::PROVINCIA_ID, $this->provincia_id);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(LocalidadPeer::DATABASE_NAME);
        $criteria->add(LocalidadPeer::ID_LOCALIDAD, $this->id_localidad);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getIdLocalidad();
    }

    /**
     * Generic method to set the primary key (id_localidad column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdLocalidad($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdLocalidad();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of Localidad (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombreLocalidad($this->getNombreLocalidad());
        $copyObj->setCodigoPostal($this->getCodigoPostal());
        $copyObj->setProvinciaId($this->getProvinciaId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDireccions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDireccion($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdLocalidad(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 Localidad Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   LocalidadPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new LocalidadPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Provincia object.
     *
     * @param                  Provincia $v
     * @return                 Localidad The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProvincia(Provincia $v = null)
    {
        if ($v === null) {
            $this->setProvinciaId(NULL);
        } else {
            $this->setProvinciaId($v->getIdProvincia());
        }

        $this->aProvincia = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Provincia object, it will not be re-added.
        if ($v !== null) {
            $v->addLocalidad($this);
        }


        return $this;
    }


    /**
     * Get the associated Provincia object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Provincia The associated Provincia object.
     * @throws PropelException
     */
    public function getProvincia(PropelPDO $con = null)
    {
        if ($this->aProvincia === null && ($this->provincia_id !== null)) {
            $this->aProvincia = ProvinciaQuery::create()->findPk($this->provincia_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProvincia->addLocalidads($this);
             */
        }

        return $this->aProvincia;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Direccion' == $relationName) {
            $this->initDireccions();
        }
    }

    /**
     * Clears out the collDireccions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDireccions()
     */
    public function clearDireccions()
    {
        $this->collDireccions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collDireccions collection.
     *
     * By default this just sets the collDireccions collection to an empty array (like clearcollDireccions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDireccions($overrideExisting = true)
    {
        if (null !== $this->collDireccions && !$overrideExisting) {
            return;
        }
        $this->collDireccions = new PropelObjectCollection();
        $this->collDireccions->setModel('Direccion');
    }

    /**
     * Gets an array of Direccion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Localidad is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Direccion[] List of Direccion objects
     * @throws PropelException
     */
    public function getDireccions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collDireccions || null !== $criteria) {
            if ($this->isNew() && null === $this->collDireccions) {
                // return empty collection
                $this->initDireccions();
            } else {
                $collDireccions = DireccionQuery::create(null, $criteria)
                    ->filterByLocalidad($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collDireccions;
                }
                $this->collDireccions = $collDireccions;
            }
        }

        return $this->collDireccions;
    }

    /**
     * Sets a collection of Direccion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $direccions A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setDireccions(PropelCollection $direccions, PropelPDO $con = null)
    {
        $this->direccionsScheduledForDeletion = $this->getDireccions(new Criteria(), $con)->diff($direccions);

        foreach ($this->direccionsScheduledForDeletion as $direccionRemoved) {
            $direccionRemoved->setLocalidad(null);
        }

        $this->collDireccions = null;
        foreach ($direccions as $direccion) {
            $this->addDireccion($direccion);
        }

        $this->collDireccions = $direccions;
    }

    /**
     * Returns the number of related Direccion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Direccion objects.
     * @throws PropelException
     */
    public function countDireccions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collDireccions || null !== $criteria) {
            if ($this->isNew() && null === $this->collDireccions) {
                return 0;
            } else {
                $query = DireccionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByLocalidad($this)
                    ->count($con);
            }
        } else {
            return count($this->collDireccions);
        }
    }

    /**
     * Method called to associate a Direccion object to this object
     * through the Direccion foreign key attribute.
     *
     * @param    Direccion $l Direccion
     * @return   Localidad The current object (for fluent API support)
     */
    public function addDireccion(Direccion $l)
    {
        if ($this->collDireccions === null) {
            $this->initDireccions();
        }
        if (!$this->collDireccions->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddDireccion($l);
        }

        return $this;
    }

    /**
     * @param	Direccion $direccion The direccion object to add.
     */
    protected function doAddDireccion($direccion)
    {
        $this->collDireccions[]= $direccion;
        $direccion->setLocalidad($this);
    }

    /**
     * @param	Direccion $direccion The direccion object to remove.
     */
    public function removeDireccion($direccion)
    {
        if ($this->getDireccions()->contains($direccion)) {
            $this->collDireccions->remove($this->collDireccions->search($direccion));
            if (null === $this->direccionsScheduledForDeletion) {
                $this->direccionsScheduledForDeletion = clone $this->collDireccions;
                $this->direccionsScheduledForDeletion->clear();
            }
            $this->direccionsScheduledForDeletion[]= $direccion;
            $direccion->setLocalidad(null);
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_localidad = null;
        $this->nombre_localidad = null;
        $this->codigo_postal = null;
        $this->provincia_id = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collDireccions) {
                foreach ($this->collDireccions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collDireccions instanceof PropelCollection) {
            $this->collDireccions->clearIterator();
        }
        $this->collDireccions = null;
        $this->aProvincia = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LocalidadPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseLocalidad:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}


        return parent::__call($name, $params);
    }

} // BaseLocalidad
