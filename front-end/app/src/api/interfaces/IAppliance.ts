export interface IAppliance{
    id : number,
    name : string,
    description : string,
    brand : string,
    voltage : string
}
export interface IApplianceCreateOrUpdate{
    name : string,
    description? : string,
    brand : string,
    voltage : string
}
export interface ILaravelResponse{
    data : IAppliance[]
    links :  {}
    meta : {}
    path : string
    per_page : number
    to : number
    total : number
}