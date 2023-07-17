import joi from "joi"

export const applianceSchema  = joi.object({
    name : joi.string().required(),
    description : joi.string(),
    brand : joi.string().required(),
    voltage : joi.string().required()
})