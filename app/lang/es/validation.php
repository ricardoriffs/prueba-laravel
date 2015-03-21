<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "The :attribute must be accepted.",
	"active_url"       => "The :attribute is not a valid URL.",
	"after"            => "The :attribute must be a date after :date.",
	"alpha"            => "El campo :attribute solo debe contener letras.",
	"alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => "The :attribute may only contain letters and numbers.",
	"before"           => "The :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => "The :attribute must be between :min - :max.",
		"file"    => "The :attribute must be between :min - :max kilobytes.",
		"string"  => "The :attribute must be between :min - :max characters.",
	),
	"confirmed"        => "The :attribute confirmation does not match.",
	"date"             => "El campo :attribute no es una fecha válida.",
	"date_format"      => "El campo :attribute no contiene el formato :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => "The :attribute must be :digits digits.",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "El campo :attribute tiene un formato inválido. Debe ser tipo email.",
	"exists"           => "The selected :attribute is invalid.",
	"image"            => "El campo :attribute debe ser una imagen.",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => "El campo :attribute debe ser un número entero.",
	"ip"               => "The :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "El campo :attribute no debe pesar más de :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
	),
	"mimes"            => "El campo :attribute debe ser una imagen con extensión: :values.",
	"min"              => array(
		"numeric" => "El campo :attribute debe ser mayor a :min.",
		"file"    => "El el campo :attribute debe pesar al menos :min kilobytes.",
		"string"  => "El campo :attribute debe tener al menos :min caracteres.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => "El campo :attribute debe ser un número.",
	"regex"            => "The :attribute format is invalid.",
	"required"         => "El campo :attribute es requerido.",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
	),
	"unique"           => "The :attribute has already been taken.",
	"url"              => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
            'nombre'=>'Nombre',
            'telefono'=>'Teléfono',
            'fecha_cumple'=> 'Fecha de Cumpleaños'
        ),

);
