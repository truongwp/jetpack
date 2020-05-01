<?php
/**
 * The Grunion_Contact_Form_Field_Data class.
 *
 * @package automattic/jetpack
 */

/**
 * This class provides the attributes and value data for a Jetpack Contact Form
 * field.
 */
class Grunion_Contact_Form_Field_Data {

	const ATTRIBUTE_NAMES = array(
		'label',
		'type',
		'required',
		'options',
		'id',
		'default',
		'values',
		'placeholder',
		'class',
	);

	/**
	 * An array containing the field's attributes.
	 *
	 * @var array
	 */
	private $attributes;

	/**
	 * The field's value.
	 *
	 * @var mixed
	 */
	private $value;

	/**
	 * The constructor.
	 *
	 * @param Grunion_Contact_Form_Field $field The Grunion_Contact_Form_Field object.
	 */
	public function __construct( $field ) {
		$this->attributes = $field->attributes;
		$this->value      = Grunion_Contact_Form_Plugin::strip_tags( $field->value );
	}

	/**
	 * Returns an array containing all of the field's attributes.
	 *
	 * @return array The field's attributes.
	 */
	public function get_attributes() {
		return $this->attributes;
	}

	/**
	 * Returns the field's submitted value.
	 *
	 * @return mixed The field value.
	 */
	public function get_value() {
		return $this->value;
	}

	/**
	 * Returns the value of the given field attribute.
	 *
	 * @param string $attr The attribute name.
	 *
	 * @return mixed|null The attribute value.
	 */
	public function get_attribute( $attr ) {
		if ( ! in_array( $attr, self::ATTRIBUTE_NAMES, true ) ) {
			return null;
		}

		return isset( $this->attributes[ $attr ] ) ? $this->attributes[ $attr ] : null;
	}
}
