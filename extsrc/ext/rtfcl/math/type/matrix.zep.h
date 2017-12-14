
extern zend_class_entry *rtfcl_math_type_matrix_ce;

ZEPHIR_INIT_CLASS(RTFCL_Math_Type_Matrix);

PHP_METHOD(RTFCL_Math_Type_Matrix, __construct);
PHP_METHOD(RTFCL_Math_Type_Matrix, transpose);
PHP_METHOD(RTFCL_Math_Type_Matrix, transposeInPlace);
PHP_METHOD(RTFCL_Math_Type_Matrix, toArray);

ZEND_BEGIN_ARG_INFO_EX(arginfo_rtfcl_math_type_matrix___construct, 0, 0, 1)
	ZEND_ARG_ARRAY_INFO(0, elements, 0)
ZEND_END_ARG_INFO()

ZEPHIR_INIT_FUNCS(rtfcl_math_type_matrix_method_entry) {
	PHP_ME(RTFCL_Math_Type_Matrix, __construct, arginfo_rtfcl_math_type_matrix___construct, ZEND_ACC_PUBLIC|ZEND_ACC_CTOR)
	PHP_ME(RTFCL_Math_Type_Matrix, transpose, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(RTFCL_Math_Type_Matrix, transposeInPlace, NULL, ZEND_ACC_PUBLIC)
	PHP_ME(RTFCL_Math_Type_Matrix, toArray, NULL, ZEND_ACC_PUBLIC)
	PHP_FE_END
};
