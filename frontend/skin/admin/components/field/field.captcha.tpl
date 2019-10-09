{**
 * Каптча
 *}

{component_define_params params=[ 'label', 'captchaName', 'name', 'captchaType', 'mods', 'attributes', 'classes' ]}

{component 'admin:field' template="captcha-{$captchaType}" params=$params}