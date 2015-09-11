<?php

/**
 * Description of Form_Users_Save
 *
 * @author arnlerou
 */
class Library_Form {

    protected $_aFields = array();
    private $_aErrors = array();

    const FORM_ERROR_MESSAGE = "Form Error";
    const FORM_ERROR_CODE = 1000;
    const NOT_SET_MESSAGE = "Field required";
    const NOT_SET_CODE = 1001;
    const NOT_STRING_MESSAGE = "Format not valid";
    const NOT_STRING_CODE = 1002;
    const NOT_EMAIL_MESSAGE = "Format not valid";
    const NOT_EMAIL_CODE = 1003;
    const NOT_INTEGER_MESSAGE = "Format not valid";
    const NOT_INTEGER_CODE = 1004;

    public function validate($aInputs, $sField, $aOptions) {

        $bIsGrupped = isset($aOptions['belongsTo']);
        $sValue = $bIsGrupped ? $aInputs[$aOptions['belongsTo']][$sField] : $aInputs[$sField];

        @array_map(function($sMethod) use ($aInputs, $sField, $aOptions, $bIsGrupped, $sValue) {
                    try {
                        $sMethod = "is_{$sMethod}";
                        if (method_exists($this, $sMethod)) {
                            $this->{$sMethod}($sValue);
                        }
                    } catch (Exception $e) {
                        if ($bIsGrupped) {
                            $this->_aErrors[$aOptions['belongsTo']][$sField][] = $e->getMessage();
                        } else {
                            $this->_aErrors[$sField][] = $e->getMessage();
                        }
                    }
                }, $aOptions['validate']);
    }

    public function isValid($aInputs) {

        foreach ($this->_aFields as $sField => $aOptions) {
            $this->validate($aInputs, $sField, $aOptions);
        }

        return empty($this->_aErrors);
    }

    public function cleanValue($aCleans, $sValue, $sField, $sFieldGroup) {
        $aValue = array_reduce($aCleans, function($aTempValues, $sMethod) use ($sValue, $sField, $sFieldGroup) {
            $sMethod = "do_{$sMethod}";
            if (method_exists($this, $sMethod)) {
                if ($sFieldGroup != '') {
                    return $aTempValues[$sFieldGroup][$sField] = $this->{$sMethod}($sValue);
                } else {
                    return $aTempValues[$sField] = $this->{$sMethod}($sValue);
                }
            }
        });

        return $aValue;
    }

    public function getValues($aInputs) {

        $aValues = array();

        foreach ($this->_aFields as $sField => $sOptions) {

            $bIsGrupped = isset($sOptions['belongsTo']);

            if ($bIsGrupped) {
                $sValue = isset($aValues[$sOptions['belongsTo']][$sField]) ? $aValues[$sOptions['belongsTo']][$sField] : $aInputs[$sOptions['belongsTo']][$sField];
                $aValues[$sOptions['belongsTo']][$sField] = $this->cleanValue($sOptions['clean'], $sValue, $sField, $bIsGrupped ? $sOptions['belongsTo'] : null);
            } else {
                $sValue = isset($aValues[$sField]) ? $aValues[$sField] : $aInputs[$sField];
                $aValues[$sField] = $this->cleanValue($sOptions['clean'], $sValue, $sField, $bIsGrupped ? $sOptions['belongsTo'] : null);
            }
        }

        return $aValues;
    }

    public function getErrors() {
        return $this->_aErrors;
    }

    public function is_required($sValue) {
        if ($sValue === '' || is_null($sValue)) {
            throw new Exception(self::NOT_SET_MESSAGE, self::NOT_SET_CODE);
        }
    }

    public function is_string($sValue) {
        if (!preg_match('/^[a-zA-Z \'\-]+$/', $sValue)) {
            throw new Exception(self::NOT_STRING_MESSAGE, self::NOT_STRING_CODE);
        }
    }

    public function is_email($sValue) {
        if (!filter_var($sValue, FILTER_VALIDATE_EMAIL)) {
            throw new Exception(self::NOT_EMAIL_MESSAGE, self::NOT_EMAIL_CODE);
        }
    }

    public function is_integer($sValue) {
        if (!preg_match('/^[0-9]+$/', $sValue)) {
            throw new Exception(self::NOT_INTEGER_MESSAGE, self::NOT_INTEGER_CODE);
        }
    }

    public function do_trim($sValue) {
        return trim($sValue);
    }

}
